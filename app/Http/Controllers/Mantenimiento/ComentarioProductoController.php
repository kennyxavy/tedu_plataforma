<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComentarioProducto;

class ComentarioProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guardar(Request $request){
        $datos=$request->all();
       
        $this->validate(request(),[
            'comentario'=>'required|string',                         
        ]);

        $registro = ComentarioProducto::create([
            'comentario'        => ($datos['comentario']),
            'user_id'        => Auth()->user()->id,
            'producto_id'        => ($datos['productoid']),
           
            ]);
        //$request->session()->flash('alert-success', 'Fue actualizado exitosamente!'); 
        return back();
    }
}
