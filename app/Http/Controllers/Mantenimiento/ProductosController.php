<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use App\Models\SubCategoriaProducto;
use Illuminate\Support\Facades\Crypt;

class ProductosController extends Controller
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

        $sql = "SELECT pro.id,cat.nombre categoria,sub.nombre subcategoria,pro.nombre,pro.precio,pro.costo,pro.anulado,pro.publicado,pro.autorizado FROM productos pro
        LEFT JOIN categoria_productos cat ON cat.id=pro.categoria_id
        LEFT JOIN subcategoria_productos sub ON sub.id=subcategoria_id
        WHERE pro.user_id=" . Auth()->user()->id;
        $datos = DB::select($sql);
        return view('Mantenimiento.Productos.index', compact("datos"));
    }

    public function crear()
    {

        $sql = "SELECT * FROM categoria_productos WHERE anulado=0  ORDER BY nombre";
        $categoria = DB::select($sql);

        $sql = "SELECT * FROM subcategoria_productos WHERE anulado=0 and id_categoria_productos=" . $categoria[0]->id . " ORDER BY nombre";
        $subcategoria = DB::select($sql);

        return view('Mantenimiento.Productos.crear', compact("categoria", "subcategoria"));
    }

    public function buscarsubcategoria(Request $request)
    {

        if (isset($request->texto)) {
            $id = $request->texto;
            $subcategoria = SubCategoriaProducto::where('id_categoria_productos', '=', $id)->where('anulado', '=', 0)->get();
            return response()->json(
                [
                    'lista' => $subcategoria,
                    'sucess' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'sucess' => false
                ]
            );
        }
    }

    public function crearnuevo(Request $request)
    {
        $datos = $request->all();

        $registro = Productos::create([
            'user_id' => Auth()->user()->id,
            'nombre' => strtoupper($datos['nombre']),
            'categoria_id' => ($datos['categoria']),
            'subcategoria_id' => ($datos['subcategoria']),
            'detalle' => addslashes($datos['descripcion']),
            'precio' => $datos['precio'],
            'costo' => $datos['costo'],
            'marca' => ($datos['marca']),
            'anulado' => ($datos['anulado']),
            'publicado' => ($datos['publicar']),
            'detalletecnico' => ($datos['otros']),
            'descuentoreferencia' => ($datos['descuentoreferencia']),

        ]);

        $file = $request->file('archivo');
        $file2 = $request->file('archivo2');
        $file3 = $request->file('archivo3');
        $file4 = $request->file('archivo4');
        $file5 = $request->file('archivo5');

        if (isset($file)) {
            $extension = $file->getClientOriginalExtension();

            $namecf = $registro->id . "." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file));

            $registro2 = Productos::where('id', '=', $registro->id)->update([
                'rutaimagen' => $namecf
            ]);
        }
        if (isset($file2)) {
            $extension = $file2->getClientOriginalExtension();

            $namecf = $registro->id . "_2." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file2));

            $registro2 = Productos::where('id', '=', $registro->id)->update([
                'rutaimagen2' => $namecf
            ]);
        }
        if (isset($file3)) {
            $extension = $file3->getClientOriginalExtension();

            $namecf = $registro->id . "_3." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file3));

            $registro2 = Productos::where('id', '=', $registro->id)->update([
                'rutaimagen3' => $namecf
            ]);
        }
        if (isset($file4)) {
            $extension = $file4->getClientOriginalExtension();

            $namecf = $registro->id . "_4." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file4));

            $registro2 = Productos::where('id', '=', $registro->id)->update([
                'rutaimagen4' => $namecf
            ]);
        }
        if (isset($file5)) {
            $extension = $file->getClientOriginalExtension();

            $namecf = $registro->id . "_5." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file5));

            $registro2 = Productos::where('id', '=', $registro->id)->update([
                'rutaimagen5' => $namecf
            ]);
        }


        $request->session()->flash('alert-success', 'Fue agregado exitosamente!');
        return back();
    }

    public function editar($id)
    {
        $id = Crypt::decrypt($id);

        $sql = "select * from productos where id=" . $id;
        $datos = DB::select($sql);

        $sql = "SELECT * FROM categoria_productos WHERE anulado=0  ORDER BY nombre";
        $categoria = DB::select($sql);

        $sql = "SELECT * FROM subcategoria_productos WHERE anulado=0  ORDER BY nombre";
        $subcategoria = DB::select($sql);

        return view('Mantenimiento.Productos.editar', compact('datos', 'categoria', 'subcategoria'));
    }

    public function editarnuevo(Request $request)
    {
        $datos = $request->all();

        $registro = Productos::where('id', '=', $datos['idproducto'])->update([
            'nombre' => strtoupper($datos['nombre']),
            'categoria_id' => ($datos['categoria']),
            'subcategoria_id' => ($datos['subcategoria']),
            'detalle' => addslashes($datos['descripcion']),
            'precio' => $datos['precio'],
            'costo' => $datos['costo'],
            'marca' => ($datos['marca']),
            'anulado' => ($datos['anulado']),
            'publicado' => ($datos['publicar']),
            'detalletecnico' => ($datos['otros']),
            'descuentoreferencia' => ($datos['descuentoreferencia']),
        ]);

        $file = $request->file('archivo');
        $file2 = $request->file('archivo2');
        $file3 = $request->file('archivo3');
        $file4 = $request->file('archivo4');
        $file5 = $request->file('archivo5');


        if (isset($file)) {
            $extension = $file->getClientOriginalExtension();

            $namecf = $datos['idproducto'] . "." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file));

            $registro = Productos::where('id', '=', $datos['idproducto'])->update([
                'rutaimagen' => $namecf
            ]);
        }
        if (isset($file2)) {
            $extension = $file2->getClientOriginalExtension();

            $namecf = $datos['idproducto'] . "_2." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file2));

            $registro2 = Productos::where('id', '=', $datos['idproducto'])->update([
                'rutaimagen2' => $namecf
            ]);
        }
        if (isset($file3)) {
            $extension = $file3->getClientOriginalExtension();

            $namecf = $datos['idproducto'] . "_3." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file3));

            $registro2 = Productos::where('id', '=', $datos['idproducto'])->update([
                'rutaimagen3' => $namecf
            ]);
        }
        if (isset($file4)) {
            $extension = $file4->getClientOriginalExtension();

            $namecf = $datos['idproducto'] . "_4." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file4));

            $registro2 = Productos::where('id', '=', $datos['idproducto'])->update([
                'rutaimagen4' => $namecf
            ]);
        }
        if (isset($file5)) {
            $extension = $file5->getClientOriginalExtension();

            $namecf = $datos['idproducto'] . "_5." . $extension;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('productos')->put($namecf, \File::get($file5));

            $registro2 = Productos::where('id', '=', $datos['idproducto'])->update([
                'rutaimagen5' => $namecf
            ]);
        }

        $request->session()->flash('alert-success', 'Fue actualizado exitosamente!');
        return back();
    }

    public function anular($id, Request $request)
    {

        $id = Crypt::decrypt($id);
        $registro = Productos::where('id', '=', $id)->update([
            'anulado' => 1
        ]);
        return back();
    }

    public function aprobar()
    {
        $sql = "SELECT pro.id,usu.name usuario,pro.precio,cat.nombre categoria,pro.nombre,pro.autorizado FROM productos pro
        LEFT JOIN users usu ON usu.id=pro.user_id
        LEFT JOIN categoria_productos cat ON cat.id=pro.categoria_id
        WHERE pro.anulado=0 and IFNULL(pro.autorizado,0)=0";
        $datos = DB::select($sql);
        return view('Mantenimiento.Productos.aprobar', compact("datos"));
    }

    public function verproducto($id)
    {
        $id = Crypt::decrypt($id);
        $sql = "SELECT pro.id,pro.nombre,pro.precio,pro.detalle,pro.detalletecnico,usu.name usuario,pro.rutaimagen, 
        cat.nombre categoria,sub.nombre subcategoria,pro.autorizado,pro.rutaimagen2,pro.rutaimagen3,pro.rutaimagen4,pro.rutaimagen5
        FROM productos pro
        LEFT JOIN users usu ON usu.id=pro.user_id 
        LEFT JOIN categoria_productos cat ON cat.id=pro.categoria_id
        LEFT JOIN subcategoria_productos sub ON sub.id=pro.subcategoria_id
        WHERE pro.id=" . $id;
        $datos = DB::select($sql);
        return view('Mantenimiento.Productos.ver', compact('datos'));
    }

    public function autorizar($id, Request $request)
    {
        $id = Crypt::decrypt($id);
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $registro = Productos::where('id', '=', $id)->update([
            'autorizado' => 1,
            'autorizadopor' => Auth()->user()->id,
            'autorizadodate' => $date
        ]);
        $request->session()->flash('alert-success', 'Fue autorizado exitosamente!');
        return back();
    }

    public function eliminar($id, Request $request)
    {
        $id = Crypt::decrypt($id);
        $datos = $request->all();

        $sql = "select * from productos where id=" . $id;
        $registro = DB::select($sql)[0];

        $file = $registro->rutaimagen;
        $file2 = $registro->rutaimagen2;
        $file3 = $registro->rutaimagen3;
        $file4 = $registro->rutaimagen4;
        $file5 = $registro->rutaimagen5;
        if (isset($file)) {

            \Storage::disk('productos')->delete($file);
        }
        if (isset($file2)) {

            \Storage::disk('productos')->delete($file2);
        }
        if (isset($file3)) {

            \Storage::disk('productos')->delete($file3);

        }
        if (isset($file4)) {

            \Storage::disk('productos')->delete($file4);

        }
        if (isset($file5)) {

            \Storage::disk('productos')->delete($file5);

        }
        Productos::destroy($id);

        $request->session()->flash('alert-success', 'Fue Eliminado exitosamente!');
        return back();
    }

  

    public function eliminarfoto($id, $fotoid, Request $request)
    {
        $id = Crypt::decrypt($id);
        // $fotoid = Crypt::decrypt($fotoid);
        $fotoid=$fotoid-1;
        // return $id;
        $sql = "select * from productos where id=" . $id;
        $registro = DB::select($sql)[0];
        // $dic=["rutaimagen", "rutaimagen2", "rutaimagen3", "rutaimagen4", "rutaimagen5"];
        $dic=[$registro->rutaimagen, $registro->rutaimagen2, $registro->rutaimagen3,$registro->rutaimagen4, $registro->rutaimagen5];
        $file = $dic[$fotoid];
        // return $fotoid;
        $fotoid ==0?$fotoid="" : $fotoid=$fotoid+1;
        // return dd($fotoid);
        if (isset($file)) {

            \Storage::disk('productos')->delete($file);
            $registro2 = Productos::where('id', '=', $registro->id)->update([
                'rutaimagen'.$fotoid => null,
            ]);
            $request->session()->flash('alert-success', 'Imagen eliminada exitosamente!');

        }
        

        return back();


    }

}