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
        
        <div class="callout callout-warning">
          <h5>Datos de los usuarios!</h5>

          <p>Solo el administrador del sistema podrá asignar un plan a un usuario en especifico, asi como darle de baja en el sistema.</p>
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
          <h3 class="card-title">Formulario de usuarios</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="{{ route('usuarios.actualizar')}}">
          @csrf
          <div class="card-body">
            <div class="form-group">                
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="cedula">DNI/Cédula</label>
                            <input type="hidden" value="{{$datos->id}}" id="idusuario" name="idusuario">
                            {!! $errors->first('cedula','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="cedula" name="cedula" value="{{$datos->dni}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre">Nombres</label> 

                            {!! $errors->first('nombres','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="{{$datos->name}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="nacimiento">Nacimiento</label> 

                            {!! $errors->first('nace','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="date" class="form-control" id="nace" name="nace" value="{{ $datos->fnacimiento }}" placeholder="Nacimiento" readonly>
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
                                    <input type="text" class="form-control" id="correo" name="correo" value="{{$datos->email}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <label for="direccion">Dirección</label> 

                            {!! $errors->first('direccion','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{$datos->direccion}}" placeholder="" readonly>
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
                                    <input type="text" class="form-control" id="mentor" name="mentor" value="{{$datos->codmentor}}" placeholder="Cod. Referido" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="telefono">Teléfono</label> 

                            {!! $errors->first('telefono','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{$datos->celular}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="plan">Plan</label> 
                            {!! $errors->first('plan','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="plan" name="plan">
                                    @foreach ($planes as $item)
                                        @if ($datos['plan_id']==$item->id)
                                            <option value={{$item->id}} selected>{{$item->nombre}}</option>
                                        @else
                                            <option value={{$item->id}}>{{$item->nombre}}</option>
                                        @endif                                
                                    @endforeach
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
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Actualizar</button>
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