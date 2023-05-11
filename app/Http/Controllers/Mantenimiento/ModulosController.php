<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Modulos;
use App\Models\ModulosFinalizar;
use Illuminate\Support\Facades\Crypt;
use PDF; // at the top of the file

class ModulosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crearnuevo(Request $request){
        $datos=$request->all();
        //dd($datos);
        $registro = Modulos::create([
            'nombre'        => ($datos['nombremodulo']),
            'categoria_cursos_id'        => $datos['idcurso2'],
            'detalle'        => ($datos['detallemodulo']),
            'linkvideo'        => ($datos['linkvideo']),
            'anulado'        => 0,
                   
            ]);

        $request->session()->flash('alert-success', 'Fue agregado exitosamente!'); 
        return back();
    }

    public function buscarmodulos(Request $request){

        $ingreso = $request->ningreso;
      
        $sql="select * from modulos_cursos where id=".$ingreso;

        $datos=DB::select($sql);
        return response()->json($datos, 200, []);

    }
    public function buscarcursos(Request $request){

        $dato = $request->dato;
        $vacio['nombre']='';

        if (Auth()->user()->plan_id==1) {
            $sql="select id,nombre from cursos where anulado=0 and plan_id=1 and nombre like '%".trim($dato)."%'";
        }else{
            $sql="select id,nombre from cursos where anulado=0 and nombre like '%".trim($dato)."%'";
        }
        
        $datos=DB::select($sql);
         
        if (count($datos)>0) {
            return response()->json($datos, 200, []);
        }else{
            return response()->json($vacio, 200, []);
        }
        

    }
    public function editarnuevo(Request $request){

        $datos=$request->all();
        //dd($datos);
        
        $registro = Modulos::where('id', '=',  $datos['idcurso3'])->update([
            'nombre'        => ($datos['enombremodulo']),
            'detalle'        => ($datos['edetallemodulo']),
            'linkvideo'        => ($datos['elinkvideo']),
            'anulado'        => $datos['eanuladomodulo'],            
             ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente!'); 
        return back();
    }

    public function consultamodulo($idmodulo,Request $request){
        $id=Crypt::decrypt($idmodulo);
     
        $sql="SELECT modulo.id,modulo.categoria_cursos_id,modulo.numero,modulo.nombre,modulo.detalle,modulo.linkvideo,modulo.anulado,
        modulo.created_at,modulo.updated_at,cur.nombre nombrecurso,ifnull(final.finalizado,0) finalizado,cur.descripcion FROM modulos_cursos modulo
        LEFT JOIN cursos cur ON cur.id=modulo.categoria_cursos_id
        LEFT JOIN (select user_id,modulos_cursos_id,max(finalizado) finalizado from finalizado_modulos_cursos group by user_id,modulos_cursos_id ) final on user_id=".Auth()->user()->id." and final.modulos_cursos_id=modulo.id 
        where modulo.categoria_cursos_id=".$id;
        $modulos=DB::select($sql);

        $sql="SELECT modulos.nombre,max(IFNULL(fin.finalizado,0)) fin FROM modulos_cursos modulos 
        LEFT JOIN finalizado_modulos_cursos fin ON fin.modulos_cursos_id=modulos.id AND fin.user_id=".Auth()->user()->id."
        WHERE modulos.categoria_cursos_id=".$id."
        GROUP BY modulos.nombre";
        $finalizado=DB::select($sql);


        if(!isset($modulos)){
            $request->session()->flash('alert-warning', 'No hay datos de modulos registrados!'); 
            return back();
        }
        return view('Mantenimiento.Cursos.detallecurso',compact('modulos','finalizado'));
    }

    public function generadiploma($nombrecurso){        
        $nombrecurso=strtoupper($nombrecurso);
        
        PDF::SetAuthor('TEDU');
		PDF::SetSubject('CERTIFICADO');
        PDF::SetKeywords('CERTIFICADO');

        PDF::setHeaderCallback(function($pdf) {
            
            // get the current page break margin
            $bMargin = PDF::getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = 5;
            // disable auto-page-break
            PDF::SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = "images/DIPLOMA.jpg";
            //file, 0, 0, 200, 120, '', '', '', false, 300, '', false, false, 0);
            PDF::Image($img_file, 0, 0, 300, 220, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            PDF::SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            PDF::setPageMark();   

        });
        
        // set margins
		//PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// set auto page breaks
		PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		// remove default footer
        PDF::setPrintFooter(false);

        // set auto page breaks
        //PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //PDF::SetAutoPageBreak(TRUE, 30);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set footer
        PDF::SetPrintFooter(TRUE);
		// ---------------------------------------------------------

		// set font
		PDF::SetFont('times','', 20);
		PDF::AddPage('L', 'A4');

        PDF::SetXY(57, 120);
		//PDF::Image("images/hcsf_logo.jpg", 5, 8, 100, 32, 'JPG');
        $html="<strong>".Auth()->user()->name."</strong>";
		PDF::writeHTMLCell(180, 15, '', '', $html, 0, 1, 0, true, 'C', true);

        PDF::SetFont('times','', 15);
        PDF::SetXY(60, 155);
        
        $html="<strong><strong>";
		PDF::writeHTMLCell(180, 15, '', '', $nombrecurso, 0, 1, 0, true, 'C', true);
        
        //PDF::Write(0, $nombrecurso, '', 0, 'L', true, 0, false, false, 0);

        //PDF::deletePage(2);
        //PDF::deletePage(3);
        //PDF::Output('DOC-'.$IDSOLICITUD.'.pdf','D');
        PDF::Output("CERTIFICADO_".$nombrecurso.".pdf","I");
        //PDF::reset();
    }

    public function finalizar(Request $request){

        $idusuario = $request->idusuario;
        $idmodulo=$request->idmodulo;
        $opcion=$request->opcion;
        
        if ($opcion=='crear') {
            $registro = ModulosFinalizar::create([
                'user_id'        => $idusuario,
                'modulos_cursos_id'        => $idmodulo,
                'finalizado'        => 1,
                        
                ]);
            return response()->json('OK', 200, []);
        }else{
            ModulosFinalizar::where('user_id',$idusuario )->where('modulos_cursos_id',$idmodulo)->delete();
            return response()->json('ELIMINADO', 200, []);
        }
    }

    public function cursoencontrado($id) 
    {
        if (Auth()->user()->plan_id==1) {
            $sql="select cat.nombre categoria,cur.fecha_desde,cur.id,upper(cur.nombre) nombre,plan.nombre plan,cur.tutor,cur.costo,cur.anulado,cur.archivo from cursos cur
            left join planes plan on plan.id=cur.plan_id
            left join categoria_cursos cat on cat.id=cur.categoria_cursos_id
            WHERE plan.id=1 and cur.anulado=0 and cur.id=".$id."
            ORDER BY plan.nombre";
        } else {
            $sql="select cat.nombre categoria,cur.fecha_desde,cur.id,upper(cur.nombre) nombre,plan.nombre plan,cur.tutor,cur.costo,cur.anulado,cur.archivo from cursos cur
            left join planes plan on plan.id=cur.plan_id
            left join categoria_cursos cat on cat.id=cur.categoria_cursos_id
            where cur.anulado=0 and cur.id=".$id."
            ORDER BY plan.nombre";
        }
        $datos=DB::select($sql);
        //dd(Auth()->user());
        return view('Mantenimiento.Cursos.cursobuscado',compact("datos"));
    }

}
