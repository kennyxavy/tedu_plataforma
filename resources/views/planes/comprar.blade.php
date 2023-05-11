@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
Mi código de referencia es: <strong>{{Auth()->user()->micodigo}}</strong>
@endsection

@section('contenedor')
<div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-bullhorn"></i>
           Información importante!!
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        
        <div class="callout callout-info">
          <h5>Compra de planes TEDU!</h5>

          <p>Por favor sirvase a llenar los campos restante del presente formulario para continuar con la compra.</p>
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-11">
        <div class="flash-message"> 
            @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
             @if(Session::has('alert-' . $msg)) 
        
             <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
             @endif 
            @endforeach 
        </div> <!-- end .flash-message -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de actualización de datos</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="{{ route('comprarplan.actualizar')}}">
          @csrf
          <div class="card-body">
            <div class="form-group">                
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="cedula">DNI/Cédula</label>

                            {!! $errors->first('cedula','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="cedula" name="cedula" value="{{Auth()->user()->dni}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre">Nombres</label> 

                            {!! $errors->first('nombres','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="{{Auth()->user()->name}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="nacimiento">Nacimiento</label> 

                            {!! $errors->first('nace','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="date" class="form-control" id="nace" name="nace" value="{{ Auth()->user()->fnacimiento }}" placeholder="Nacimiento">
                            </div>
                        </div>
                    </div> 
                     
                    
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="correo">Correo</label>

                            {!! $errors->first('correo','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="correo" name="correo" value="{{Auth()->user()->email}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <label for="direccion">Dirección</label> 

                            {!! $errors->first('direccion','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{Auth()->user()->direccion}}" placeholder="">
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mentor">Código de Referido</label> 

                            {!! $errors->first('mentor','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="mentor" name="mentor" value="{{Auth()->user()->codmentor}}" placeholder="Cod. Referido">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="telefono">Teléfono</label> 

                            {!! $errors->first('telefono','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{Auth()->user()->celular}}" placeholder="" readonly>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-check">
                                @if (Auth()->user()->aceptatermino==1)
                                    <input class="form-check-input" name="termino" id="termino" type="checkbox" checked>
                                @else
                                    <input class="form-check-input" name="termino" id="termino" type="checkbox">
                                @endif
                                <label class="form-check-label">Acepta términos y condiciones TEDU para la suscripción PRO?</label>
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
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Actualizar mis datos</button>
                    </div>
                   
                    <div class="col-sm-6">
                        @if (Auth()->user()->datosupdate==1)
                            <a href="{{route('comprarplan.pago')}}"><button type="button" class="btn btn-warning" >Proceder al pago</button></a>    
                        @else
                            <a href="#"><button type="button" class="btn btn-warning" disabled>Por favor actualice primero la información..</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>    
</div>


@endsection

@section('script-abajo')

@endsection