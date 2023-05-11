@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
    <a href="{{ route('envios') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Editar envío
@endsection

@section('contenedor')
<div class="flash-message"> 
  @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
   @if(Session::has('alert-' . $msg)) 

   <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   @endif 
  @endforeach 
</div> <!-- end .flash-message -->
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-11">
        <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Atención
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <div class="callout callout-info">
                  <h5>Estimado usuario</h5>

                  <p>Deberá de confirmar los parámetros de envío segun los lugares que Ud. vaya a realizar la negociación.</p>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>  
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de actualización de envío</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="{{ route('envios.editar.nuevo')}}">
          @csrf
          <div class="card-body">
            <div class="form-group">                
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="destino">Destino</label>
                            {!! $errors->first('destino','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="hidden" name="idenvio" id="idenvio" value="{{$datos[0]->id}}">
                                    <input type="text" class="form-control" id="destino" name="destino" value="{{$datos[0]->destino}}" placeholder="Destino" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="precio">Precio</label> 

                            {!! $errors->first('precio','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="precio" name="precio" value="{{$datos[0]->precio}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="plan">Anulado</label> 
                            {!! $errors->first('anulado','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="anulado" name="anulado">
                                    @if ($datos[0]->anulado==1)
                                        <option value="1" selected>SI</option>
                                        <option value="0">NO</option>
                                    @else
                                        <option value="1">SI</option>
                                        <option value="0" selected>NO</option>
                                    @endif
                                   
                                </select>
                            </div>
                        </div>
                        
                    </div> 
                                       
                </div>
                           
            </div>            
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                                   
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>    
</div>
@endsection