<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Envios;
use Illuminate\Support\Facades\Crypt;

class EnviosController extends Controller
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
    
      
    public function index(Request $request)
    {
           
        $sql="select * from maestro_envios where user_id=".Auth()->user()->id;
        $datos=DB::select($sql);

        return view('Mantenimiento.Envios.index',compact("datos")); 
    }

    public function crear(){
        return view("Mantenimiento.Envios.crear");
    }

    public function crearnuevo(Request $request){
        $datos=$request->all();
       
        $this->validate(request(),[
            'destino'=>'required|string',
            'precio'=>'required|numeric',
        ]);

        $registro = Envios::create([
            'destino' => strtoupper($datos['destino']),
            'precio'  => $datos['precio'],
            'user_id' => Auth()->user()->id,
            'anulado' => 0,
            ]);
        $request->session()->flash('alert-success', 'Fue agregado exitosamente!'); 
        return back();
    }

    public function editar($id){
        $id =  Crypt::decrypt($id);
        
        $sql="select * from maestro_envios where id=".$id;

        $datos=DB::select($sql);
        //dd($datos);

        return view('Mantenimiento.Envios.editar',compact('datos'));
    }

    public function editarnuevo(Request $request){

        $datos=$request->all();
        //dd($datos);
        $this->validate(request(),[
            'destino'=>'required|string',
            'precio'=>'required|numeric',
            
        ]);

        $registro = Envios::where('id', '=',  $datos['idenvio'])->update([
            'destino' => strtoupper($datos['destino']),
            'precio'  => $datos['precio'],
            'anulado'=> $datos['anulado'],            
             ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente!'); 
        return back();
    }
}
