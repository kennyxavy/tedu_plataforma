@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('productos.aprobar') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Información del producto
@endsection

@section('contenedor')

<div class="flash-message"> 
  @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
   @if(Session::has('alert-' . $msg)) 

   <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   @endif 
  @endforeach 
</div> <!-- end .flash-message -->

<div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none">{{$datos[0]->nombre}}</h3>
          <div class="col-12">
            <img class="product-image" src="{{url('image_productos/'.$datos[0]->rutaimagen)}}"  alt="Product Image">
          </div>
          <div class="col-12 product-image-thumbs">
            <div class="product-image-thumb active"><img src="{{url('image_productos/'.$datos[0]->rutaimagen)}}" alt="Product Image"></div>
            @if ($datos[0]->rutaimagen2)
              <div class="product-image-thumb" ><img src="{{url('image_productos/'.$datos[0]->rutaimagen2)}}" alt="Product Image"></div>
            @endif
            @if ($datos[0]->rutaimagen3)
              <div class="product-image-thumb" ><img src="{{url('image_productos/'.$datos[0]->rutaimagen3)}}" alt="Product Image"></div>
            @endif
            @if ($datos[0]->rutaimagen4)
              <div class="product-image-thumb" ><img src="{{url('image_productos/'.$datos[0]->rutaimagen4)}}" alt="Product Image"></div>
            @endif
            @if ($datos[0]->rutaimagen5)
              <div class="product-image-thumb" ><img src="{{url('image_productos/'.$datos[0]->rutaimagen5)}}" alt="Product Image"></div>
            @endif           
          </div>
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3">{{$datos[0]->nombre}}</h3>
          <p>{{$datos[0]->detalle}}</p>

          <hr>
          
          
          <div class="py-2 px-3 mt-4">
            <h3 class="mb-0">
              Precio: $ {{$datos[0]->precio}}
            </h3>
            <small>Publicado por: {{$datos[0]->usuario}}</small><br>
            <small>Categoria: {{$datos[0]->categoria}}</small><br>
            <small>Subcategoria: {{$datos[0]->subcategoria}}</small>
          </div>

          
          <div class="mt-4">
            @if ($datos[0]->autorizado==0)
              <a href="{{url('productos/autorizar/'.Crypt::encrypt($datos[0]->id))}}" class="btn btn-outline-primary btn-lg btn-flat"><i class="fa fa-check" aria-hidden="true"></i>  Autorizar su publicación</a>         
            @endif
          </div>          

        </div>
      </div>
      <div class="row mt-4">
        <nav class="w-100">
          <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Detalle técnico</a>
          </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$datos[0]->detalle}}</div>
          <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><textarea class="form-control" name="detalle2" id="detalle2" rows="10" cols="130">{{$datos[0]->detalletecnico}}</textarea> </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>




@endsection
@section('script-abajo')

@endsection