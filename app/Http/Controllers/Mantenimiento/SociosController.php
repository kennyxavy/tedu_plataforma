<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TransaccionMonedero;

class SociosController extends Controller
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
	 if(Auth()->user()->categoria_users_id!=1){
            return view("auth.login");
        }
        $sql="SELECT usu.id,usu.dni,usu.micodigo codmentor,usu.name nombre,IFNULL(saldo_moneda(usu.id),0) misaldo,IFNULL(retorna_pago(usu.id),0) retornapago,IFNULL(saldo_moneda(usu.id),0) + IFNULL(retorna_pago(usu.id),0) saldofinal,retorna_ultimopago(usu.id) ultimopago,plan.nombre plan FROM users usu
        LEFT JOIN planes plan ON plan.id=usu.plan_id
        GROUP BY usu.id,usu.dni,usu.micodigo,usu.name,plan.nombre HAVING IFNULL(retorna_pago(usu.id),0)>0 
        ";
        $datos=DB::select($sql);
	//return dd($datos);
        return view('Mantenimiento.PagoSocio.index',compact("datos")); 
    }

    public function pagos(Request $request){
        date_default_timezone_set('America/Guayaquil');

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $anio = $date->format('Y');
        $mes = $date->format('m');
        $sql="SELECT usu.id,usu.dni,usu.micodigo codmentor,usu.name nombre,IFNULL(saldo_moneda(usu.id),0) misaldo,IFNULL(retorna_pago(usu.id),0) retornapago,IFNULL(saldo_moneda(usu.id),0) + IFNULL(retorna_pago(usu.id),0) saldofinal,usu.created_at afiliadodesde,plan.nombre plan FROM users usu
        LEFT JOIN planes plan ON plan.id=usu.plan_id
        HAVING IFNULL(retorna_pago(usu.id),0)>0 
        ";
        $datos=DB::select($sql);

        if(!$datos){
            $request->session()->flash('alert-danger', 'No hay datos que procesar.'); 
            return back();
        }

        $pagototal=0;
        foreach ($datos as $value) { 
            $registro3 = TransaccionMonedero::create([
                'user_id'        => $value->id,
                'tipo'        => 'ING',
                'fecha'        => $date,
                'valor'        => round($value->retornapago,2),    
                'detalle' => 'Pago por comisiones por niveles de referencia Año: '.$anio.' Mes: '.$mes, 
                'pagosocio' => 1,      
                'pagadopor' => Auth()->user()->id,             
                ]);
                $pagototal=$pagototal+round($value->retornapago,2);
        }
        $request->session()->flash('alert-success', 'Se ha realizado correctamente el pago del Año: '.$anio.' Mes: '.$mes.' por un total de '.$pagototal); 
        return back();

    }
    public function buscar(Request $request){
        if (isset($request->ningreso)) {
            $id=$request->ningreso;
            $datos=DB::select('call sp_niveles(?)', array($id));
           
           
            return response()->json(
                    [
                        'lista' =>$datos,
                        'sucess'=>true
                    ]
                );
            //return response()->json($datos, 200, []);
        }else{
            return response()->json(
                    [
                        'sucess'=>false
                    ]
                );
        }
    }
    
}
