<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\CategoriaCurso;
use Illuminate\Support\Facades\Crypt;

class CategoriaCursoController extends Controller
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
        $sql="SELECT * FROM categoria_cursos ";
        $datos=DB::select($sql);
        return view('Mantenimiento.CursosCategoria.index',compact("datos"));
    }

    public function crear(){
        return view('Mantenimiento.CursosCategoria.crear');
    }

    public function crearnuevo(Request $request){
        $datos=$request->all();
       
        $this->validate(request(),[
            'nombre'=>'required|string',
            
        ]);

        $registro = CategoriaCurso::create([
            'nombre'        => strtoupper($datos['nombre']),
           
            ]);
        $request->session()->flash('alert-success', 'Fue agregado exitosamente!'); 
        return back();
    }

    public function editar($id){
        $id =  Crypt::decrypt($id);
        
        $sql="select * from categoria_cursos where id=".$id;

        $datos=DB::select($sql);
        //dd($datos);

        return view('Mantenimiento.CursosCategoria.editar',compact('datos'));
    }

    public function editarnuevo(Request $request){

        $datos=$request->all();
        //dd($datos);
        $this->validate(request(),[
            'nombre'=>'required|string',
            
        ]);

        $registro = CategoriaCurso::where('id', '=',  $datos['idcategoria'])->update([
            'nombre'           => strtoupper($datos['nombre']),
            
             ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente!'); 
        return back();
    }
}
