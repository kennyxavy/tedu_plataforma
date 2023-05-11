<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracion;
class ConfiguracionController extends Controller
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
        $datos=Configuracion::find(1);
        return view('Mantenimiento.Configuraciones.index',compact("datos"));
    }

    public function guardar(Request $request){
        $datos=$request->all();
       
        $this->validate(request(),[
            'porcentajeventa'=>'required|numeric',
            'cgye'=>'required|numeric',
            'cotras'=>'required|numeric',     
            'porcentajeretiro'=>'required|numeric',   
            'porcentajementor'=>'required|numeric',                   
        ]);

        $registro = Configuracion::where('id', '=',  1)->update([
            'porcentajeganancia'        => ($datos['porcentajeventa']),
            'costoenvio1'        => ($datos['cgye']),
            'costoenvio2'        => ($datos['cotras']),
            'porcentajeretiro'        => ($datos['porcentajeretiro']),
            'porcentajementor' => ($datos['porcentajementor']),
            ]);

        $request->session()->flash('alert-success', 'Fue actualizado exitosamente!'); 
        return back();
    }
}
