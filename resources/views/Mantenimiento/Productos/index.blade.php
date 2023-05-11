@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Productos para el Market
@endsection

@section('contenedor')
<div>
    <a href="{{ route('productos.crear') }}" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>  Añadir</a>
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
      <th>Categoria</th>
      <th>Subcategoria</th>
      <th>Producto</th> 
      <th>Precio</th> 
      <th>Utilidad</th>  
      <th>Estado</th>  
      <th>Publicado</th>  
      <th>Autorizado</th>  
      <th>Editar</th>
      <th>Anular</th>
      <th>Eliminar</th>

    </tr>
    </thead>
    <tbody>
      
      @foreach ($datos as $item)
        <tr>
            <td>{{$item->categoria}}</td>
            <td>{{$item->subcategoria}}</td>
            <td>{{$item->nombre}}</td>
            <td>{{$item->precio}}</td>
            <td>{{$item->precio-$item->costo}}</td>
            <td><span class='badge badge-info'>{{$item->anulado==0?"Activo":"Inactivo"}}</span></td>
            <td><span class='badge badge-info'>{{$item->publicado==1?"Si":"NO"}}</span></td>
            @if ($item->autorizado==1)
            <td><span class='badge badge-success'>Autorizado</span></td>
            @else
            <td><span class='badge badge-danger'>Sin autorización</span></td>
            @endif
            <td><a href="{{ url('productos/editar/'.Crypt::encrypt($item->id)) }}" class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
            <td><a href="{{ url('productos/anular/'.Crypt::encrypt($item->id)) }}" class="btn btn-warning pull-center" onclick="return confirm('Estas seguro de anular el registro?')"><i class="fas fa-times"></i> </a></td>
            <td><a href="{{ url('productos/eliminar/'.Crypt::encrypt($item->id)) }}" class="btn btn-danger pull-center" onclick="return confirm('Estas seguro de eliminar el registro?')"><i class="fas fa-trash"></i> </a></td>
        </tr>
      @endforeach
    
    </tbody>
</table>


@endsection
@section('script-abajo')

@endsection