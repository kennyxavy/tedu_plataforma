@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Autorización de productos
@endsection

@section('contenedor')

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
      <th>Usuario</th>
      <th>Categoria</th>
      <th>Producto</th> 
      <th>Precio</th>  
      <th>Estado</th>
      <th>Ver</th>
    </tr>
    </thead>
    <tbody>
      
      @foreach ($datos as $item)
        <tr>
            <td>{{$item->usuario}}</td>
            <td>{{$item->categoria}}</td>
            <td>{{$item->nombre}}</td>
            <td>{{$item->precio}}</td>
            @if ($item->autorizado==1)
            <td><span class='badge badge-success'>Autorizado</span></td>
            @else
            <td><span class='badge badge-danger'>Sin autorización</span></td>
            @endif
            <td><a href="{{ url('productos/ver/'.Crypt::encrypt($item->id)) }}" class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
        </tr>
      @endforeach
    
    </tbody>
</table>


@endsection
@section('script-abajo')

@endsection