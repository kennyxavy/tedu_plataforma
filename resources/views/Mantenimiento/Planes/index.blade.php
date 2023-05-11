@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Planes registrados en el sistema
@endsection

@section('contenedor')
<div>
    <a href="{{ route('planes.crear') }}" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>  Añadir</a>
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
      <th>IDs</th>
      <th>Nombre</th>
      <th>Descripcion</th>  
      <th>Valor</th>  
      <th>Editar</th>
      <th>Anular</th>

    </tr>
    </thead>
    <tbody>
    
      @foreach ($datos as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nombre}}</td>
            <td>{{$item->descripcion}}</td>
            <td>{{$item->valor}}</td>
            <td><a href="{{ url('planes/editar/'.Crypt::encrypt($item->id)) }}" class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
            <td><a href="{{ url('planes/anular/'.Crypt::encrypt($item->id)) }}" class="btn btn-danger pull-center" onclick="return confirm('Estas seguro de anular el registro?')"><i class="fas fa-times"></i> </a></td>
        </tr>
      @endforeach
    
    </tbody>
</table>


@endsection