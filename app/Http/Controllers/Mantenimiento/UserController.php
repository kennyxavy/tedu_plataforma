<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sql = "SELECT usu.id,usu.nombres,usu.apellidos,usu.email,usu.celular,usu.micodigo,usu.created_at,cat.nombre categoria,usu.dni,plan.nombre plan,usu.codmentor FROM users usu
        LEFT JOIN categoria_users cat on cat.id=usu.categoria_users_id
        LEFT JOIN planes plan on plan.id=usu.plan_id";
        $datos = DB::select($sql);
        return view('Mantenimiento/Usuarios/index', compact('datos'));
    }

    public function editar($idusuario)
    {

        if (Auth()->user()->categoria_users_id <> 1) {
            $request->session()->flash('alert-danger', 'No puede acceder a esta sección');
            return back();
        }

        $datos = User::find($idusuario);
        $sql = "SELECT * FROM planes";
        $planes = DB::select($sql);
        //dd($datos);
        return view('Mantenimiento/Usuarios/editar', compact('datos', 'planes'));
    }

    public function actualizar(Request $request)
    {
        $datos = $request->all();
        //dd($datos);
        $registro = User::where('id', '=',  $datos['idusuario'])->update([
            'plan_id'           => strtoupper($datos['plan']),
        ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente');
        return back();
    }

    public function mired()
    {

        $idusuario = Auth()->user()->id;

        $sql = "CALL sp_niveles('" . $idusuario . "')";

        $datos = DB::select($sql);
        return view('Mantenimiento/Usuarios/mired', compact('datos'));
    }

    public function misdatos()
    {
        $datos = User::find(Auth()->user()->id);
        $sql = "SELECT * FROM planes";
        $planes = DB::select($sql);
        //dd($datos);
        return view('Mantenimiento/Usuarios/misdatos', compact('datos', 'planes'));
    }
    function obtener_edad_segun_fecha($fecha_nacimiento)
    {
        $dia = date("d");
        $mes = date("m");
        $ano = date("Y");


        $dianaz = date("d", strtotime($fecha_nacimiento));
        $mesnaz = date("m", strtotime($fecha_nacimiento));
        $anonaz = date("Y", strtotime($fecha_nacimiento));


        //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

        if (($mesnaz == $mes) && ($dianaz > $dia)) {
            $ano = ($ano - 1);
        }

        //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

        if ($mesnaz > $mes) {
            $ano = ($ano - 1);
        }

        //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

        $edad = ($ano - $anonaz);

        return $edad;
    }

    public function actualizar2(Request $request)
    {
        $datos = $request->all();

        //validar fecha hasta los 17 años
        $edad = $this->obtener_edad_segun_fecha($datos['nace']);
        //dd($edad);
        if ($edad < 17) {
            $request->session()->flash('alert-danger', 'Por favor verificar, edad mínima permitida 17 años.');
            return back();
        }


        //dd($datos);
        $registro = User::where('id', '=',  $datos['idusuario'])->update([
            'fnacimiento'           => $datos['nace'],
            'direccion'           => strtoupper($datos['direccion']),
            'codmentor'           => $datos['mentor'],
            'telefono'           => $datos['telefono'],
            'nacionalidad'           => strtoupper($datos['nacionalidad']),
            'tipocuenta'           => strtoupper($datos['tipocuenta']),
            'numerocuenta'           => $datos['ncuenta'],
            'banco'           => strtoupper($datos['banco']),
        ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente');
        return back();
    }
}
