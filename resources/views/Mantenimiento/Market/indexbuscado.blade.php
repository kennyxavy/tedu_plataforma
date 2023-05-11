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
<a href="{{ route('market') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>

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
    <h3 class="h3"><strong>MARKET GLOBAL - TEDU EMPRENDE</strong></h3>
    @if (isset($datos[0]->subcategoria))
        <h4 class="h4"><strong>{{$datos[0]->subcategoria}}</strong></h4>
    @else
        <h4 class="h4"><strong>NO HAY DATOS REGISTRADOS</strong></h4> 
    @endif
    <div class="row">
        @foreach ($datos as $item)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2">
                        <a href="{{url('market/ver/'.Crypt::encrypt($item->id))}}">
                            <img class="img-thumbnail" src="{{url('image_productos/'.$item->rutaimagen)}}">
                        </a>
                        <ul class="social">
                            <li><a href="{{url('market/ver/'.Crypt::encrypt($item->id))}}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                            <li><a data-tip="Add to Cart" id="agregarcarro"  onclick="registratemporal({{$item->id}});return false;"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <a class="add-to-cart" href="" onclick="registratemporal({{$item->id}});return false;">Agregar al carro</a>
                    </div>
                    <div class="product-content">
                        <h4 class="title"><a href="#">{{$item->nombre}}</a></h4>
                        <span class="publicado">Publicado por: {{$item->publicadopor}}</span><br>
                        <span class="price">$ {{$item->precio}}</span>
                    </div>
                </div>
            </div> 
        @endforeach               
    </div>
</div>
@endsection
@section('script-abajo')
<script>

    function registratemporal(idproducto){
        //console.log(idproducto)
        //document.getElementById("formventa").reset();  
        $.ajax({  
            url: "{{route('registracarro')}}",                      
            dataType: "json",        
            data: {
            unico:idproducto
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    Swal.fire(
                    'Producto agregado a su carrito',
                    'Continuar comprando..',
                    'success'
                    )          
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

</script>

@endsection