@extends('themes/lte/layaout')
@section('cabecera')
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('otrolink')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('titulo')
 Estimado comprador, en esta sección podrá observar los items seleccionados antes de comprar los productos.<br>
 Su saldo actual es de <strong>$ {{$misaldo[0]->saldo}}</strong> 
@endsection

@section('contenedor')

<div class="flash-message"> 
  @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
   @if(Session::has('alert-' . $msg)) 

   <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   @endif 
  @endforeach 
</div> <!-- end .flash-message -->


<div class="container">
    <h3 class="h3"><strong><i class="fa fa-shopping-bag"></i> CARRITO DE COMPRA - TEDU</strong></h3>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col"></th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descuento</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $total=0;
                        $iva=0;
                        $totalacumulado=0;
                    @endphp
                    @foreach ($datos as $item)
                        @php
                            $total=$total+$item->subtotal;
                            $iva=$iva+($item->subtotal*0.12);
                            
                        @endphp
                        <tr>
                            <td><img width="50" height="50"  class="img-fluid" src="{{url('image_productos/'.$item->rutaimagen)}}" alt=""></td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td>
                                <a href="" onclick="registratemporal({{$item->id}},'mas');return false;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                <a href="" onclick="registratemporal({{$item->id}},'menos');return false;"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                            </td>
                            <td>{{$item->precio}}</td>
                            <td>{{$item->descuento}}</td>
                            <td>{{round($item->subtotal,2)}}</td>
                        </tr>
                    @endforeach         
                
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>* Los items aplican los impuestos correspondiente.</td>
                        <td></td>
                        <td></td>
                        <th>Subtotal</th>
                        <th>{{round($total,2)}}</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>IVA 12%</th>
                        <th>{{round($iva,2)}}</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Envio</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="envio" name="envio" onchange="registratemporal2(this);">
                                        <option value="0" selected></option>
                                        @foreach ($destinos as $item)
                                            <option value={{$item->id}}>{{$item->destino}}</option>
                                        @endforeach
                                        <!--
                                        @if ($envio)
                                            @if ($envio[0]->ciudad=="Guayaquil")
                                                <option value="0">Sin envio</option>
                                                <option value="1" selected>Guayaquil</option>
                                                <option value="2">Otras provincias</option>
                                            @endif
                                            @if ($envio[0]->ciudad=="Otros")
                                                <option value="0">Sin envio</option>
                                                <option value="1">Guayaquil</option>
                                                <option value="2" selected>Otras provincias</option>
                                            @endif
                                        @else
                                            <option value="0" selected>Sin envio</option>
                                            <option value="1">Guayaquil</option>
                                            <option value="2">Otras provincias</option>
                                        @endif
                                        -->                                                                         
                                    </select>
                                </div>
                            </div>                           
                        </td>
                        <td></td>
                        <td></td>
                        @if ($envio)
                            <th>Costo de envío a {{$envio[0]->ciudad}}</th>
                        @else
                            <th>Costo de envío a ...</th>
                        @endif
                        
                        @if ($envio)
                            <th>{{round($envio[0]->costo,2)}}</th>
                        @else   
                            <th>{{0.00}}</th>
                        @endif
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Mentor</label>
                                <div class="col-sm-4">
                                    @if ($mentor)
                                        <input type="text" class="form-control" id="mentor" name="mentor" value="{{ $mentor[0]->mentor}}" onblur="registratemporal3(this);return false;"">
                                    @else
                                        <input type="text" class="form-control" id="mentor" name="mentor" value="" onblur="registratemporal3(this);return false;"">
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <th>Fee administrativo</th>
                        <th>{{round($total,2)*($configuracion[0]->porcentajeganancia/100)}}</th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <th>Total</th>
                      @if ($envio)
                        <th>{{round($total+$iva+$envio[0]->costo+(round($total,2)*($configuracion[0]->porcentajeganancia/100)),2)}}</th>
                      @else
                        <th>{{round($total+$iva+0+(round($total,2)*($configuracion[0]->porcentajeganancia/100)),2)}}</th>
                      @endif
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        <th><a href="{{ route('pagarcompra') }}" class="btn btn-primary pull-right"><i class="fa fa-usd" aria-hidden="true"></i> Pagar con Wallet</a></th>
                    </tr>
                </tfoot>
          </table>          
          
        </div>

    </div>
</div>
@endsection
@section('script-abajo')
<script>

    function registratemporal(idproducto,orden){
        //console.log(idproducto)
        //document.getElementById("formventa").reset();  
        $.ajax({  
            url: "{{route('actualizarcarro')}}",                      
            dataType: "json",        
            data: {
            unico:idproducto,
            orden:orden
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    location.reload()
                }else{
                    Swal.fire(
                    'Problemas al registrar su selección',
                    'Intentar luego..',
                    'error'
                    )
                }
            }
        });
    }

    function registratemporal2(sel)
    {
        //alert(sel.value);
        $.ajax({  
            url: "{{route('actualizarcarro2')}}",                      
            dataType: "json",        
            data: {
            unico:sel.value
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    location.reload()
                }else{
                    Swal.fire(
                    'Problemas al registrar su selección',
                    'Intentar luego..',
                    'error'
                    )
                }
            }
        });
    }

    function registratemporal3(sel)
    {
        //alert(sel.value);
        $.ajax({  
            url: "{{route('actualizarcarro3')}}",                      
            dataType: "json",        
            data: {
            unico:sel.value
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    //location.reload()
                }else{
                    Swal.fire(
                    'Problemas al registrar su mentor de referencia',
                    'Por favor verifique si el codigo es correcto o solicitelo nuevamente.',
                    'error'
                    )
                }
            }
        });
    }
</script>
@endsection