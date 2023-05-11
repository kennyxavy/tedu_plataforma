@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Envíos de mercadería
@endsection

@section('contenedor')
<div>
    <a href="{{ route('envios.crear') }}" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>  Añadir</a>
</div>
<div class="flash-message"> 
  @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
   @if(Session::has('alert-' . $msg)) 

   <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   @endif 
  @endforeach 
</div> <!-- end .flash-message -->
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Destino</th>
      <th>Precio</th>
      <th>Estado</th>
      <th>Editar</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach ($datos as $item)
        <tr>
            <td>{{$item->destino}}</td>
            <td>{{$item->precio}}</td>
            <td>{{$item->anulado==1?'INACTIVO':'ACTIVO'}}</td>
            <td><a href="{{ url('envios/editar/'.Crypt::encrypt($item->id)) }}" class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
        </tr>
      @endforeach
    
    </tbody>
</table> 


@endsection