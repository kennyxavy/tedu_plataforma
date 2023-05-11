@extends('themes/lte/layaout')
@section('cabecera')
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="{{asset('css/autocompletar.css')}}">
@endsection
@section('otrolink')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('titulo')
    <div class="input-group mb-12">
        <input type="text" class="form-control" id="txtbusca" placeholder="Buscar un producto" aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div> <small></small>
        <div id="suggestions"></div>
    </div>
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
    <form class="form-inline" method="post" action="{{ route('itembuscar')}}" accept-charset="UTF-8" id="post1" name="post1">
        @csrf
        <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-3">
                {!! $errors->first('categoria','<span class="help-block text-danger">:message</span>') !!}
                <div class="input-group mb-3">
                    <select class="form-control" id="categoria" name="categoria">
                        @foreach ($categoria as $item)
                            <option value={{$item->id}}>{{$item->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                {!! $errors->first('subcategoria','<span class="help-block text-danger">:message</span>') !!}
                <div class="input-group mb-3">
                    <select class="form-control" id="subcategoria" name="subcategoria">
                        @foreach ($subcategoria as $item)
                            <option value={{$item->id}}>{{$item->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary mb-2">Aplicar filtro</button>
            </div>
        </div>
        </div>
    </form>
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
<script>
    const csrftoken=document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('categoria').addEventListener('change',(e)=>{
        fetch("{{url('buscarsubcategoria')}}",{
            headers:{
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': csrftoken// <--- aquí el token
            },
            credentials: "same-origin",
            method:'POST',
            body:JSON.stringify({texto:e.target.value})
            
        }).then(response=>{
            return response.json()
        }).then(data=>{
            var opciones="<option value=''>Escoger subcategoria</option>";
            console.log(data);
            for (let i in data.lista) {
               opciones+='<option value='+data.lista[i].id+'>'+data.lista[i].nombre+'</option>';
            }
            document.getElementById("subcategoria").innerHTML=opciones;
        }).catch(error => console.error(error));
    })
</script> 
<script>
    function getRealPath(){
        var localObj = window.location;
        var contextPath = localObj.pathname.split("/")[1];
        var basePath = localObj.protocol + "//" + localObj.host + "/"+ contextPath;
        return basePath ;
    }

</script>

<script>
    $("body").click(function() {
        $('#suggestions').fadeOut(500);
    });
    $(document).ready(function(){
         $("#txtbusca").keyup(function(){
              var parametros=$(this).val()
             
              $.ajax({
                     data: {
                        dato:parametros
                     },
                    url:   "{{route('market.buscarproducto')}}",
                    dataType: "json",
                    beforeSend: function () { },
                    success:  function (response) {    
                        console.log(getRealPath());  
                        //document.getElementById("salida").value=response[0].nombre
                        datos='';
                        response.forEach(element => {
                            ruta=getRealPath();
                            ruta1=ruta+"/public/market/productoencontrado/"+element.id
                            datos=datos+'<div><a class="suggest-element" href="'+ruta1+'" data="'+element.nombre+'" id="'+element.id+'">'+element.nombre+' $'+element.precio+'</a></div>';
                        });
                        $("#suggestions").fadeIn(1000).html(datos);
                        $('.suggest-element').on('click', function(){
                            //Obtenemos la id unica de la sugerencia pulsada
                            var id = $(this).attr('id');
                            //Editamos el valor del input con data de la sugerencia pulsada
                            $('#key').val($('#'+id).attr('data'));
                            //Hacemos desaparecer el resto de sugerencias
                            $('#suggestions').fadeOut(1000);
                            //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                            //return false;
                        }); 
                  },
                  error:function(){
                       //alert("error")
                    }
               });
         })
    })
</script>
@endsection