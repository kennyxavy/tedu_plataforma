@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Documentos a la fecha
    <a href="{{ url('monedero/contifico/actualizar') }}" class="btn btn-success pull-right"><i class="fa fa-undo"></i>  Actualizar pagos premium</a>
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
      <th>Fecha</th>
      <th>Tipo</th>
      <th>ID de usuario</th>
      <th>Detalle</th>  
      <th>Valor</th>  
    </tr>
    </thead>
    <tbody>
      @php
          $saldo=0;
      @endphp
      @foreach ($datos as $item)
        @php
            if($item->tipo=='ING'){
                $saldo=$saldo+$item->valor;
            }else {
                $saldo=$saldo-$item->valor;
            }
        @endphp
        <tr>
            <td>{{$item->created_at}}</td>
            <td>{{$item->tipo}}</td>
            <td>{{$item->user_id}}</td>
            <td>{{$item->detalle}}</td>
            @if ($item->tipo=='EGR')
                <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                  </svg> {{$item->valor}}</td>
            @else
                <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg> {{$item->valor}}</td>
            @endif
            
        </tr>
      @endforeach
    
    </tbody>
</table>

@endsection