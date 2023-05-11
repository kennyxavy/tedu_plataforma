<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class PlanesController extends Controller
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
        $sql="SELECT usu.id,usu.nombre,usu.descripcion,usu.valor FROM planes usu";
        $datos=DB::select($sql);
        return view('Mantenimiento.Planes.index',compact("datos"));
    }

    public function comprar()
    {
        return view ('planes.comprar');
    }

    public function compraractualizar(Request $request){
        
        $datos=$request->all();
        
        if(!isset($datos["termino"])){
            $request->session()->flash('alert-danger', 'Para proceder el pago, es necesario que acepte los términos y condiciones.'); 
            return back();
        }

        $this->validate(request(),[
            'direccion'=>'required|string|',
            'nace'=>'required|',
        ]);

        $registro = User::where('id', '=',  Auth()->user()->id)->update([
            'direccion'           => strtoupper($datos['direccion']),
            'fnacimiento' =>$datos['nace'],  
            'datosupdate' =>  1,   
            'aceptatermino' => trim($datos['termino'])=='on'?1:0,
            'fechaaceptatermino'=>now(),    
             ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente, puede hacer uso del boton de pago en la parte inferior...!'); 
        return back();
    }

    public function pago(){
        return view ('planes.escogerpago');
    }
}
