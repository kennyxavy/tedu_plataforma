@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('home') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Despachar de TEDU MARKET
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
      <th>No. transaccion Wallet</th>
      <th>Fecha transaccion Wallet</th>
      <th>Destino</th>
      <th>Total</th> 
      <th>Estado</th>  
      <th>Ver</th>
      <th>Finalizar</th>
    </tr>
    </thead>
    <tbody>      
      @foreach ($datos as $item)
        <tr>
            <td>{{$item->fecha}}</td>
            <td>{{str_pad($item->id, 5, "0", STR_PAD_LEFT)}}</td>
            <td>{{$item->usuario}}</td>
            <td>{{str_pad($item->monederoid, 5, "0", STR_PAD_LEFT)}}</td>
            <td>{{$item->monederofecha}}</td>
            <td>{{$item->lugarenvio}}</td>
            <td>{{$item->total}}</td>
            @if ($item->despachado==1)
            <td><span class='badge badge-success'>Despachado</span></td>
            @else
            <td><span class='badge badge-warning'>Pendiente</span></td>
            @endif
            <td><a href="" class="btn btn-warning pull-center" onclick="callmodal({{$item->id}})" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i> </a></td>
            <td><a href="{{ url('despachar/'.Crypt::encrypt($item->id)) }}" class="btn btn-info pull-center"><i class="fas fa-user-edit"></i> </a></td>
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
                  <th>Publicado por</th>
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
                  '<td>'+data[i].publicadopor+'</td>'+                     
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