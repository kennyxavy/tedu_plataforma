@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Mis ventas por producto de TEDU MARKET
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
      <th>No. Pedido</th>
      <th>Pedido por</th> 
      <th>Cantidad</th>
      <th>Producto</th>
      <th>Estado</th>  
      <th>Ganancia</th>  
    </tr>
    </thead>
    <tbody>      
      @foreach ($datos as $item)
        <tr>
            <td>{{$item->fecha}}</td>
            <td>{{str_pad($item->id, 5, "0", STR_PAD_LEFT)}}</td>
            <td>{{$item->pedidopor}}</td>
            <td>{{$item->cantidad}}</td>
            <td>{{$item->producto}}</td>
            @if ($item->despachado==1)
            <td><span class='badge badge-success'>Despachado</span></td>
            @else
            <td><span class='badge badge-warning'>Pendiente</span></td>
            @endif
            <td>{{$item->utilidad}}</td>
        </tr>
      @endforeach
    
    </tbody>
</table>

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detalle del pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
                <tr>
                  <th>Cantidad</th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Iva</th>
                  <th>Subtotal</th>
                </tr>
                <tbody id="detallecomentario">

                </tbody>                                           
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script-abajo')
<script>
  function callmodal(numero) {
      
      $("#detallecomentario").children().remove();
      var d="";
      $.ajax({  
          url: "{{route('buscarpedido')}}",                      
          dataType: "json",        
          data: {
            id:numero
          }, 
          success: function(data)             
          {
             console.log(data);
             for (let i = 0; i < data.length; i++) {
                 
                 d+= '<tr>'+
                  '<td>'+data[i].cantidad+'</td>'+
                  '<td>'+data[i].producto+'</td>'+                    
                  '<td>'+data[i].precio+'</td>'+
                  '<td>'+data[i].iva+'</td>'+
                  '<td>'+data[i].total+'</td>'+
                  '</tr>';
                 
             }                 
                  
              $("#detallecomentario").append(d);
          }
      });      
     
      $('#exampleModalScrollable').modal();
  }

 
</script>
@endsection