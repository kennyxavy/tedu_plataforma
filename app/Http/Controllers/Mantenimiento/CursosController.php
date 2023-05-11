<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Cursos;
use Illuminate\Support\Facades\Crypt;

class CursosController extends Controller
{
    //
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
        $sql="select cat.nombre categoria,cur.id,cur.nombre,plan.nombre plan,cur.tutor,cur.costo,cur.anulado from cursos cur
        left join planes plan on plan.id=cur.plan_id
        left join categoria_cursos cat on cat.id=cur.categoria_cursos_id";
        $datos=DB::select($sql);
        //dd(Auth()->user());
        return view('Mantenimiento.Cursos.index',compact("datos"));
    }

    public function crear(){

        $sql="SELECT * FROM planes";
        $planes=DB::select($sql);

        $sql="SELECT * FROM categoria_cursos";
        $categoria=DB::select($sql);

        return view('Mantenimiento.Cursos.crear',compact("planes","categoria"));
    }

    public function crearnuevo(Request $request){
        $datos=$request->all();
       
        $this->validate(request(),[
            'nombre'=>'required|string',
            'costo'=>'required|numeric',
            'descripcion'=>'required|string',
            'tutor'=>'required|string',
            'desde'=>'required',            
        ]);

        

        $registro = Cursos::create([
            'nombre'        => ($datos['nombre']),
            'categoria_cursos_id'        => ($datos['categoria']),
            'plan_id'        => ($datos['plan']),
            'free'        => 0,
            'anulado'        => ($datos['anulado']),
            'descripcion'        => addslashes($datos['descripcion']),
            'tutor'        => ($datos['tutor']),
            'costo'        => ($datos['costo']),
            'fecha_desde'        => ($datos['desde'])
           
            ]);

        $file = $request->file('archivo');
        $extension=$file->getClientOriginalExtension();
    
        $namecf=$registro->id.".".$extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('cursos')->put($namecf,  \File::get($file));
    
        $registro = Cursos::where('id', '=',$registro->id)->update([
                'archivo'    => $namecf               
                ]);

        $request->session()->flash('alert-success', 'Fue agregado exitosamente!'); 
        return back();
    }

    public function editar($id){
        $id =  Crypt::decrypt($id);
        
        $sql="select * from cursos where id=".$id;

        $datos=DB::select($sql);
        //dd($datos);

        $sql="SELECT * FROM planes";
        $planes=DB::select($sql);

        $sql="SELECT * FROM categoria_cursos";
        $categoria=DB::select($sql);

        $sql="SELECT * FROM modulos_cursos where categoria_cursos_id=".$id;
        $modulos=DB::select($sql);

        return view('Mantenimiento.Cursos.editar',compact('datos','planes','categoria','modulos'));
    }

    public function editarnuevo(Request $request){

        $datos=$request->all();
        //dd($datos);
        $this->validate(request(),[
            'nombre'=>'required|string',
            'costo'=>'required|numeric',
            'descripcion'=>'required|string',
            'tutor'=>'required|string',
            'desde'=>'required',     
        ]);

        if($request->file('archivo')){
            $file = $request->file('archivo');
            $extension=$file->getClientOriginalExtension();    
            $namecf=$datos['idcurso'].".".$extension;
                //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('cursos')->put($namecf,  \File::get($file));
        
            $registro = Cursos::where('id', '=',$datos['idcurso'])->update([
                    'archivo'    => $namecf               
                    ]);
        }     
         
        
        $registro = Cursos::where('id', '=',  $datos['idcurso'])->update([
            'nombre'        => ($datos['nombre']),
            'categoria_cursos_id'        => ($datos['categoria']),
            'plan_id'        => ($datos['plan']),
            'free'        => 0,
            'anulado'        => ($datos['anulado']),
            'descripcion'        => addslashes($datos['descripcion']),
            'tutor'        => ($datos['tutor']),
            'costo'        => ($datos['costo']),   
            'fecha_desde'        => ($datos['desde'])         
             ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente!'); 
        return back(); 
    }

    public function listadocursos()
    {
        
        if (Auth()->user()->plan_id==1) {
            $sql="select cat.nombre categoria,cur.fecha_desde,cur.id,upper(cur.nombre) nombre,plan.nombre plan,cur.tutor,cur.costo,cur.anulado,cur.archivo from cursos cur
            left join planes plan on plan.id=cur.plan_id
            left join categoria_cursos cat on cat.id=cur.categoria_cursos_id
            WHERE plan.id=1 and cur.anulado=0
            ORDER BY plan.nombre";
        } else {
            $sql="select cat.nombre categoria,cur.fecha_desde,cur.id,upper(cur.nombre) nombre,plan.nombre plan,cur.tutor,cur.costo,cur.anulado,cur.archivo from cursos cur
            left join planes plan on plan.id=cur.plan_id
            left join categoria_cursos cat on cat.id=cur.categoria_cursos_id
            where cur.anulado=0
            ORDER BY plan.nombre";
        }
        
        $datos=DB::select($sql);
        //dd(Auth()->user());
        return view('Mantenimiento.Cursos.curso',compact("datos"));
    }

    
    public function academia()
    {
        return view('Mantenimiento.Cursos.academia');

    }
    public function listacursos()
    {
        return view('Mantenimiento.Cursos.listacursos');

    }
    public function cursocoaching()
    {
        return view('Mantenimiento.Cursos.cursocoaching');

    }
    public function cursoventas()
    {
        return view('Mantenimiento.Cursos.cursoventas');

    }
    public function cursocontenidos()
    {
        return view('Mantenimiento.Cursos.cursocontenidos');

    }
    public function cursomarketing()
    {
        return view('Mantenimiento.Cursos.cursomarketing');

    }
    public function cursoecommerce()
    {
        return view('Mantenimiento.Cursos.cursoecommerce');

    }
    public function cursofinanzas()
    {
        return view('Mantenimiento.Cursos.cursofinanzas');

    }
    public function cursomindset()
    {
        return view('Mantenimiento.Cursos.cursomindset');

    }
    public function cursoredesociales()
    {
        return view('Mantenimiento.Cursos.cursoredesociales');

    }
    public function cursoblockchain()
    {
        return view('Mantenimiento.Cursos.cursoblockchain');

    }
    public function cursoia()
    {
        return view('Mantenimiento.Cursos.cursoia');

    }
    public function cursoviajes()
    {
        return view('Mantenimiento.Cursos.cursoviajes');

    }
    public function cursotrading()
    {
        return view('Mantenimiento.Cursos.cursotrading');

    }
    public function cursoemprendimiento()
    {
        return view('Mantenimiento.Cursos.cursoemprendimiento');

    }
    public function cursoreferencias()
    {
        return view('Mantenimiento.Cursos.cursoreferencias');

    }
    public function cursoinmobiliarios()
    {
        return view('Mantenimiento.Cursos.cursoinmobiliarios');

    }
    public function cursomarketplace()
    {
        return view('Mantenimiento.Cursos.cursomarketplace');

    }
    public function cursoseguros()
    {
        return view('Mantenimiento.Cursos.cursoseguros');

    }







}




