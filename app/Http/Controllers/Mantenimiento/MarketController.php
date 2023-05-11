<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\TemporalCart;
use App\Models\Productos;
use App\Models\PedidoCab;
use App\Models\PedidoMov;
use App\Models\TransaccionMonedero;
use App\Models\TmpCostoEnvio;
use App\Models\Configuracion;
use App\Models\Envios;
use App\Models\TmpMentor;
use App\Models\RatingProducto;
use App\Models\RatingProveedor;

class MarketController extends Controller
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
    
    public function retornacarro(){
        $sql="SELECT pro.id,pro.nombre,SUM(cart.cantidad) cantidad FROM tmp_cart cart 
        LEFT JOIN productos pro ON pro.id=cart.producto_id
        WHERE cart.user_id=".Auth()->user()->id."
        GROUP BY pro.id,pro.nombre
        ";
        $carrito=DB::select($sql);
        return $carrito;
    }
    
    public function index(Request $request)
    {
        $carro=$this->retornacarro();
        
        $sql="SELECT pro.id,cat.nombre categoria,sub.nombre subcategoria,pro.nombre,pro.precio,pro.anulado,pro.publicado,pro.autorizado,pro.rutaimagen,usu.name publicadopor FROM productos pro
        LEFT JOIN categoria_productos cat ON cat.id=pro.categoria_id
        LEFT JOIN subcategoria_productos sub ON sub.id=subcategoria_id
        LEFT JOIN users usu ON usu.id=pro.user_id
        WHERE pro.autorizado=1 and pro.publicado=1 and pro.anulado=0 LIMIT 30";
        $datos=DB::select($sql);

        $sql="SELECT * FROM categoria_productos WHERE anulado=0  ORDER BY nombre";
        $categoria=DB::select($sql);

        $sql="SELECT * FROM subcategoria_productos WHERE anulado=0 and id_categoria_productos=".$categoria[0]->id." ORDER BY nombre";
        $subcategoria=DB::select($sql); 


        return view('Mantenimiento.Market.index',compact("datos","carro","categoria","subcategoria")); 
    }

    public function indexbuscado(Request $request){
        $carro=$this->retornacarro();

        $subcategoria=$request->subcategoria;
        
        
        $sql="SELECT pro.id,cat.nombre categoria,sub.nombre subcategoria,pro.nombre,pro.precio,pro.anulado,pro.publicado,pro.autorizado,pro.rutaimagen,usu.name publicadopor FROM productos pro
        LEFT JOIN categoria_productos cat ON cat.id=pro.categoria_id
        LEFT JOIN subcategoria_productos sub ON sub.id=subcategoria_id
        LEFT JOIN users usu ON usu.id=pro.user_id
        WHERE pro.autorizado=1 and pro.publicado=1 and pro.anulado=0 and pro.subcategoria_id=".$subcategoria;
        $datos=DB::select($sql);
        
        return view('Mantenimiento.Market.indexbuscado',compact("datos","carro"));
    }
    
    public function verproducto($id){

        $carro=$this->retornacarro();

        $id =  Crypt::decrypt($id);
        $sql="SELECT pro.id,pro.nombre,pro.precio,pro.detalle,pro.detalletecnico,usu.name usuario,pro.rutaimagen, 
        cat.nombre categoria,sub.nombre subcategoria,pro.autorizado,pro.rutaimagen2,pro.rutaimagen3,pro.rutaimagen4,pro.rutaimagen5,pro.user_id 
        FROM productos pro
        LEFT JOIN users usu ON usu.id=pro.user_id 
        LEFT JOIN categoria_productos cat ON cat.id=pro.categoria_id
        LEFT JOIN subcategoria_productos sub ON sub.id=pro.subcategoria_id
        WHERE pro.id=".$id;
        $datos=DB::select($sql);
        
        $sql="SELECT pro.comentario,pro.created_at,usu.name FROM 
        comentario_productos pro
       LEFT JOIN users usu ON usu.id=pro.user_id 
       WHERE pro.producto_id=".$id;
        $comentario=DB::select($sql);

        $sql="SELECT pro.cantidad FROM 
        rating_producto pro
        WHERE pro.producto_id=".$id." AND user_id=".Auth()->user()->id;
        $rating=DB::select($sql);

        $sql="SELECT pro.cantidad FROM 
        rating_proveedor pro
        WHERE pro.proveedor_id=".$datos[0]->user_id." AND user_id=".Auth()->user()->id;
        $ratingpro=DB::select($sql);

        $sql="SELECT avg(pro.cantidad) rate FROM 
        rating_producto pro
        WHERE pro.producto_id=".$id;
        $ratingavg=DB::select($sql);

        $sql="SELECT avg(pro.cantidad) rate FROM 
        rating_proveedor pro
        WHERE pro.proveedor_id=".$datos[0]->user_id;
        $ratingprogavg=DB::select($sql);

        return view('Mantenimiento.Market.verproducto',compact('datos','carro','comentario','rating','ratingavg','ratingpro','ratingprogavg')); 
    }

    public function registracarro(Request $request){
        
        if (isset($request->unico)) {
            $id=$request->unico;
            $registro = TemporalCart::create([
                'user_id'        => Auth()->user()->id,
                'producto_id'        => $id,
                'cantidad'        => 1,                         
                ]);       
            
            return response()->json(
                    [
                        'lista' =>'OK',
                        'sucess'=>true
                    ]
                );
        }else{
            return response()->json(
                    [
                        'sucess'=>false
                    ]
                );
        }
    }

    public function registrastar(Request $request){
        
        if (isset($request->cantidad)) {
            $cantidad=$request->cantidad;
            $producto=$request->producto;
            
            $sql="DELETE FROM rating_producto WHERE user_id=".Auth()->user()->id." and producto_id=".$producto;
            $datos3=DB::select($sql);
            
            $registro = RatingProducto::create([
                'user_id'        => Auth()->user()->id,
                'producto_id'        => $producto,
                'cantidad'        => $cantidad,                         
                ]);       
            
            return response()->json(
                    [
                        'lista' =>'OK',
                        'sucess'=>true
                    ]
                );
        }else{
            return response()->json(
                    [
                        'sucess'=>false
                    ]
                );
        }
    }


    public function registrastarpro(Request $request){
        
        if (isset($request->cantidad)) {
            $cantidad=$request->cantidad;
            $proveedor=$request->proveedor;
            
            $sql="DELETE FROM rating_proveedor WHERE user_id=".Auth()->user()->id." and proveedor_id=".$proveedor;
            $datos3=DB::select($sql);
            
            $registro = RatingProveedor::create([
                'user_id'        => Auth()->user()->id,
                'proveedor_id'        => $proveedor,
                'cantidad'        => $cantidad,                         
                ]);       
            
            return response()->json(
                    [
                        'lista' =>'OK',
                        'sucess'=>true
                    ]
                );
        }else{
            return response()->json(
                    [
                        'sucess'=>false
                    ]
                );
        }
    }

    public function micarrito(){

        $carro=$this->retornacarro();
        $misaldo=$this->obtenersaldo();

        $sql="SELECT pro.id,MAX(pro.rutaimagen) rutaimagen,pro.nombre,SUM(cart.cantidad) cantidad,
        MAX(pro.precio) precio,
        CASE WHEN IFNULL(MAX(tmp.mentor),'')<>'' THEN MAX(IFNULL(pro.descuentoreferencia,0)) ELSE 0 END descuento,
        CASE WHEN IFNULL(MAX(tmp.mentor),'')<>'' THEN (SUM(cart.cantidad) * (MAX(pro.precio)-(CASE WHEN IFNULL(MAX(tmp.mentor),'')<>'' THEN MAX(IFNULL(pro.descuentoreferencia,0)) ELSE 0 END))) ELSE
  			(SUM(cart.cantidad) * MAX(pro.precio)) END subtotal,
        MAX(pro.user_id) prouser_id 
        FROM tmp_cart cart 
        LEFT JOIN productos pro ON pro.id=cart.producto_id
        LEFT JOIN tmp_mentor tmp ON tmp.user_id=".Auth()->user()->id."
        WHERE cart.user_id=".Auth()->user()->id."
        GROUP BY pro.id,pro.nombre
        ";
        $datos=DB::select($sql);

        $sql="SELECT * FROM configuracion WHERE id=1";
        $configuracion=DB::select($sql);
 
        $sql="SELECT * FROM tmp_costoenvio WHERE user_id=".Auth()->user()->id;
        $envio=DB::select($sql);

        if ($datos) {
            $sql="SELECT * FROM maestro_envios WHERE anulado=0 and user_id=".$datos[0]->prouser_id;
            $destinos=DB::select($sql);
        } else {
            $sql="SELECT * FROM maestro_envios WHERE anulado=0 and user_id=0";
            $destinos=DB::select($sql);
        }
          
        $sql="SELECT mentor FROM pedido_cab WHERE user_id=".Auth()->user()->id." ORDER BY fecha DESC LIMIT 1";
        $mentor=DB::select($sql);

        if($mentor){
            $sql="DELETE FROM tmp_mentor WHERE user_id=".Auth()->user()->id;
            $datos3=DB::select($sql);

            $registro = TmpMentor::create([
                'user_id'        => Auth()->user()->id,
                'mentor'        => $mentor[0]->mentor,
                ]); 
        }

        return view('Mantenimiento.Market.carrito',compact('datos','destinos','carro','misaldo','configuracion','envio','mentor'));
    }

    public function actualizarcarro(Request $request){
        
        if (isset($request->unico)) {
            $id=$request->unico;
            $orden=$request->orden;
            
            if ($orden=='mas') {
                $registro = TemporalCart::create([
                    'user_id'        => Auth()->user()->id,
                    'producto_id'        => $id,
                    'cantidad'        => 1,                         
                    ]);  
            } else {
                $sql="DELETE FROM tmp_cart WHERE user_id=".Auth()->user()->id." AND producto_id=".$id." LIMIT 1";
                $datos=DB::select($sql);
            }           
            return response()->json(
                    [
                        'lista' =>'OK',
                        'sucess'=>true
                    ]
                );
        }else{
            return response()->json(
                    [
                        'sucess'=>false
                    ]
                );
        }
    }

    public function actualizarcarro3(Request $request){
        
        $sql="SELECT * FROM users WHERE codmentor='".$request->unico."'";
        $datos=DB::select($sql);
        if(!isset($datos[0]->id)){
            return response()->json(
                [
                    'sucess'=>false
                ]
            );
        }
                       
        if (isset($request->unico)) {
            $id=$request->unico;
        
            $sql="DELETE FROM tmp_mentor WHERE user_id=".Auth()->user()->id;
            $datos=DB::select($sql);

            $registro = TmpMentor::create([
                'user_id'        => Auth()->user()->id,
                'mentor'        => $id
                ]); 
            
          
            return response()->json(
                    [
                        'lista' =>'OK',
                        'sucess'=>true
                    ]
                );
        }else{
            return response()->json(
                    [
                        'sucess'=>false
                    ]
                );
        }
    }
    public function actualizarcarro2(Request $request){
        
        if (isset($request->unico)) {
            $orden=$request->unico;
            
            //$confi=Configuracion::find(1);
            $config=Envios::find($orden);
            //dd($config);
            $sql="DELETE FROM tmp_costoenvio WHERE user_id=".Auth()->user()->id;
            $datos=DB::select($sql);

            if (isset($orden)) {
                $registro = TmpCostoEnvio::create([
                    'user_id'        => Auth()->user()->id,
                    'costo'        => $config->precio, 
                    'ciudad'        => $config->destino,                 
                    ]);  
            } 
            /*if ($orden=='2'){
                $registro = TmpCostoEnvio::create([
                    'user_id'        => Auth()->user()->id,
                    'costo'        => $confi->costoenvio2,
                    'ciudad'        => 'Otros',                  
                    ]);
            }    */       
            return response()->json(
                    [
                        'lista' =>'OK',
                        'sucess'=>true
                    ]
                );
        }else{
            return response()->json(
                    [
                        'sucess'=>false
                    ]
                );
        }
    }

    public function obtenersaldo(){
        $sql="SELECT SUM(IF(tipo='ING',valor,valor*-1)) saldo FROM transaccion_monedero WHERE user_id=".Auth()->user()->id;
        $saldo=DB::select($sql);
        return $saldo;
    }

    public function pagarcompra(Request $request){
        $datos2=$request->all();
        //dd($datos2);

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $misaldo=$this->obtenersaldo();
        session(['saldoCuenta' => $misaldo[0]->saldo]);

        /*$sql="SELECT pro.id,pro.nombre,SUM(cart.cantidad) cantidad,MAX(pro.precio) precio,MAX(pro.costo) costo,(SUM(cart.cantidad) * MAX(pro.precio)) subtotal,(SUM(cart.cantidad) * MAX(pro.precio))*0.12 iva FROM tmp_cart cart 
        LEFT JOIN productos pro ON pro.id=cart.producto_id
        WHERE cart.user_id=".Auth()->user()->id."
		GROUP BY pro.id,pro.nombre
        ";*/
        $sql="SELECT pro.id,MAX(pro.rutaimagen) rutaimagen,pro.nombre,SUM(cart.cantidad) cantidad,
        MAX(pro.precio) precio,MAX(pro.costo) costo,
        CASE WHEN IFNULL(MAX(tmp.mentor),'')<>'' THEN MAX(IFNULL(pro.descuentoreferencia,0)) ELSE 0 END descuento,
        CASE WHEN IFNULL(MAX(tmp.mentor),'')<>'' THEN (SUM(cart.cantidad) * (MAX(pro.precio)-(CASE WHEN IFNULL(MAX(tmp.mentor),'')<>'' THEN MAX(IFNULL(pro.descuentoreferencia,0)) ELSE 0 END))) ELSE
  			(SUM(cart.cantidad) * MAX(pro.precio)) END subtotal,
            (SUM(cart.cantidad) * (MAX(pro.precio)-(CASE WHEN IFNULL(MAX(tmp.mentor),'')<>'' THEN MAX(IFNULL(pro.descuentoreferencia,0)) ELSE 0 END)))*0.12 iva
        FROM tmp_cart cart 
        LEFT JOIN productos pro ON pro.id=cart.producto_id
        LEFT JOIN tmp_mentor tmp ON tmp.user_id=".Auth()->user()->id."
        WHERE cart.user_id=".Auth()->user()->id."
        GROUP BY pro.id,pro.nombre";

        $compra=DB::select($sql);

        $sql="SELECT * FROM configuracion WHERE id=1
        ";
        $fee=DB::select($sql);

        $sql="SELECT * FROM tmp_costoenvio WHERE user_id=".Auth()->user()->id;
        $envio=DB::select($sql);

        $sql="SELECT * FROM tmp_mentor WHERE user_id=".Auth()->user()->id;
        $mentor=DB::select($sql);

        $totalpedido=0;
        $subtotalacumulado=0;
        foreach ($compra as $value) {
           
            $totalpedido=$totalpedido+$value->subtotal+$value->iva;
            $subtotalacumulado=$subtotalacumulado+$value->subtotal;
        }


        $enviocosto=0;
        $totalfinal=0;

        if($envio){
            $totalpedido=$totalpedido+($subtotalacumulado*$fee[0]->porcentajeganancia/100)+$envio[0]->costo;
            $enviocosto=$envio[0]->costo;
        }else{
            $totalpedido=$totalpedido+($subtotalacumulado*$fee[0]->porcentajeganancia/100)+0;
            $enviocosto=0;
        }
        
        //dd($misaldo);
        if ($totalpedido>$misaldo[0]->saldo) {
            $request->session()->flash('alert-danger', 'Su saldo de $ '.$misaldo[0]->saldo.' no es suficiente como para realizar la compra de $ '.$totalpedido.', por favor recargue.'); 
            return back();
        }

        if (!isset($compra[0]->cantidad)) {
            $request->session()->flash('alert-danger', 'No se detecta productos a facturar.'); 
            return back();
        }

        
        //registro del pedidocabecera
        $registro = PedidoCab::create([
            'user_id'        => Auth()->user()->id,
            'fecha'        => $date,
            'anulado'        => 0,
            'despachado'        => 0,    
            'total' => $totalpedido,  
            'fee' => $totalpedido*$fee[0]->porcentajeganancia/100,  
            'envio' => $enviocosto, 
            'mentor' => $mentor[0]->mentor,  
            'lugarenvio' => $envio[0]->ciudad,                     
            ]);
        $idregistro=$registro->id;
        if ($idregistro) {
            foreach ($compra as $value) {
                $registro2 = PedidoMov::create([
                    'pedido_id'        => $idregistro,
                    'producto_id'        => $value->id,
                    'cantidad'        => $value->cantidad,
                    'precio'        => $value->precio, 
                    'costo'        => $value->costo,
                    'subtotal'        => $value->subtotal,  
                    'total'        => $value->subtotal+$value->iva,  
                    'iva'        => $value->iva, 
                    'descuento'        => $value->descuento,  
                    ]);                
            }
        }
        //registro de gasto
        $registro3 = TransaccionMonedero::create([
            'user_id'        => Auth()->user()->id,
            'tipo'        => 'EGR',
            'fecha'        => $date,
            'valor'        => $totalpedido,    
            'detalle' => 'Por compra segun pedido No. '.$idregistro.' en el MARKET TEDU', 
            'observacion' => '',  
            'pedido_id' => $idregistro,                    
            ]);
        
        //Borrar del carrito temporal
        TemporalCart::where('user_id',Auth()->user()->id )->delete();
        TmpCostoEnvio::where('user_id',Auth()->user()->id )->delete();

        $sql="SELECT ped.id,ped.fecha,ped.user_id,ped.anulado,ped.despachado,ped.total pedidototal,
        usu.name usuario,pro.id productoid,pro.nombre producto,mov.cantidad,mov.precio,mov.subtotal,mov.total,mov.iva,
        usu.dni,usu.celular,usu.email,mon.id monedero_id
        FROM pedido_cab ped
        LEFT JOIN users usu ON usu.id=ped.user_id
        LEFT JOIN pedido_mov mov ON mov.pedido_id=ped.id
        LEFT JOIN productos pro ON pro.id=mov.producto_id
        LEFT JOIN transaccion_monedero mon ON mon.pedido_id=ped.id
        WHERE ped.id=".$idregistro;
        $datos=DB::select($sql);

        $misaldo=$this->obtenersaldo();
        session(['saldoCuenta' => $misaldo[0]->saldo]);
        
        return view('Mantenimiento.Market.invoice',compact('datos'));
    }

    public function mispedidos(){
        $sql="SELECT ped.id,ped.user_id,ped.fecha,ped.anulado,ped.despachado,mon.id monederoid,mon.fecha monederofecha,ped.total
        FROM pedido_cab ped 
        LEFT JOIN transaccion_monedero mon ON mon.pedido_id=ped.id
        WHERE ped.user_id=".Auth()->user()->id." ORDER BY id DESC";
        $datos=DB::select($sql);
        return view("Mantenimiento.Market.mispedidos",compact('datos'));
    }

    public function misventas(){
        $sql="SELECT ped.id,ped.user_id,ped.fecha,ped.anulado,ped.despachado,pro.nombre producto,mov.precio,mov.costo,mov.precio-mov.costo utilidad,usu.name pedidopor,
        mov.cantidad
        FROM pedido_mov mov
        INNER JOIN pedido_cab ped ON mov.pedido_id=ped.id
        LEFT JOIN users usu ON usu.id=ped.user_id
        LEFT JOIN productos pro ON pro.id=mov.producto_id
        WHERE pro.user_id=".Auth()->user()->id." ORDER BY id DESC";
        $datos=DB::select($sql);
        return view("Mantenimiento.Market.misventas",compact('datos'));
    }

    public function buscarpedido(Request $request){
      
        $idventa = $request->id;
       
        $sql="SELECT mov.cantidad,mov.producto_id,mov.precio,mov.subtotal,mov.iva,pro.nombre producto,mov.total,usu.name publicadopor FROM pedido_mov mov 
        LEFT JOIN productos pro ON pro.id=mov.producto_id
        LEFT JOIN users usu ON usu.id=pro.user_id
        WHERE mov.pedido_id=".$idventa;

        $datos=DB::select($sql);

        return response()->json($datos, 200, []);

    }

    public function misdespachos(){
        $sql="SELECT ped.id,ped.user_id,ped.fecha,ped.anulado,ped.despachado,mon.id monederoid,mon.fecha monederofecha,ped.total,usu.name usuario,ped.lugarenvio
        FROM pedido_cab ped 
        LEFT JOIN transaccion_monedero mon ON mon.pedido_id=ped.id
        LEFT JOIN users usu ON usu.id=ped.user_id
        WHERE ped.anulado=0 AND ped.despachado=0 ORDER BY id DESC";
        $datos=DB::select($sql);
        return view("Mantenimiento.Market.misdespachos",compact('datos'));
    }

    public function despachar($id,Request $request){

        $id =  Crypt::decrypt($id);

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $info=PedidoCab::find($id);
        $confi=Configuracion::find(1);
        $porcentajementor=$confi->porcentajementor;
        $fee=$info->fee;
        $comision=$fee*($porcentajementor/100);
        $sql="select id from users where codmentor='".$info->mentor."'";
        $idusario=DB::select($sql);
        
        //registro de gasto
        if($idusario){
            $registro3 = TransaccionMonedero::create([
                'user_id'        => $idusario[0]->id,
                'tipo'        => 'ING',
                'fecha'        => $date,
                'valor'        => $comision,    
                'detalle' => 'Por comisiones en ventas Pedido No.'.$id, 
                'observacion' => '',  
                'pedido_id' => $id,                    
                ]);
        }
        
        $registro = PedidoCab::where('id', '=',  $id)->update([
            'despachado'        => 1,                       
             ]);
        $request->session()->flash('alert-success', 'Fue actualizado exitosamente!'); 
        return back();
    }

    public function buscarproducto(Request $request){

        $dato = $request->dato;
        $vacio['nombre']='';

        $sql="select id,nombre,precio from productos where autorizado=1 and publicado=1 and anulado=0 and nombre like '%".trim($dato)."%'";
        $datos=DB::select($sql);
         
        if (count($datos)>0) {
            return response()->json($datos, 200, []);
        }else{
            return response()->json($vacio, 200, []);
        }
        

    }

    public function productoencontrado($id)
    {
        $carro=$this->retornacarro();
        
        $sql="SELECT pro.id,cat.nombre categoria,sub.nombre subcategoria,pro.nombre,pro.precio,pro.anulado,pro.publicado,pro.autorizado,pro.rutaimagen,usu.name publicadopor FROM productos pro
        LEFT JOIN categoria_productos cat ON cat.id=pro.categoria_id
        LEFT JOIN subcategoria_productos sub ON sub.id=subcategoria_id
        LEFT JOIN users usu ON usu.id=pro.user_id
        WHERE pro.autorizado=1 and pro.publicado=1 and pro.anulado=0 and pro.id=".$id;
        $datos=DB::select($sql);

        return view('Mantenimiento.Market.productoencontrado',compact("datos","carro")); 
    }


}
