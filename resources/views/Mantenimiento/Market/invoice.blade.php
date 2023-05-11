@extends('themes/lte/layaout')
@section('cabecera')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('otrolink')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('titulo')
@endsection

@section('contenedor')

<div class="flash-message"> 
  @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
   @if(Session::has('alert-' . $msg)) 

   <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   @endif 
  @endforeach 
</div> <!-- end .flash-message -->

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            TEDU, se pondrá en contacto contigo para gestionar tu solicitud comprada. Agradecemos tu compra.
          </div>
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <a href="#" class="brand-link">
                    <img src="{{asset('images/tedu.png')}}" alt="" class="brand-image">
                </a>
                <h4>
                  <small class="float-right">Date: {{$datos[0]->fecha}}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <br>
                <address>
                  <strong>TEDU EMPRENDE</strong><br>
                  Email: teduemprende@gmail.com
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <br>
                <address>
                  <strong>{{$datos[0]->usuario}}</strong><br>
                  Dni: {{$datos[0]->dni}}<br>
                  Telf: {{$datos[0]->celular}}<br>
                  Email: {{$datos[0]->email}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Doc Pedido {{str_pad($datos[0]->id, 5, "0", STR_PAD_LEFT)}}</b><br>
                <br>
                <b>Modo de pago</b> Wallet TEDU EMPRENDE<br>
                <b>Transaccion No. </b> {{str_pad($datos[0]->monedero_id, 5, "0", STR_PAD_LEFT)}}
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $subtotalacu=0;
                        $ivaacu=0;
                    @endphp
                    @foreach ($datos as $item)
                        @php
                            $subtotalacu=$subtotalacu+$item->subtotal;
                            $ivaacu=$ivaacu+$item->iva
                        @endphp
                        <tr>
                            <td>{{$item->cantidad}}</td>
                            <td>{{$item->producto}}</td>
                            <td>{{$item->precio}}</td>
                            <td>{{$item->subtotal}}</td>
                        </tr>
                    @endforeach                 
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Método de pago:</p>
                Wallet TEDU EMPRENDE
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  TEDU, gestionará el proceso con la finalidad de garantizar todo el proceso. En caso de existir algun problema le será notificado de forma oportuna.
                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead"></p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>{{$subtotalacu}}</td>
                    </tr>
                    <tr>
                      <th>Impuesto (12%)</th>
                      <td>{{$ivaacu}}</td>
                    </tr>
                    <tr>
                      <th>Otros costos (Fee + Envío)</th>
                      <td>{{$ivaacu}}</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>{{$datos[0]->pedidototal}}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>





@endsection
@section('script-abajo')

@endsection