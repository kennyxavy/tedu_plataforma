@extends('themes/lte/layaout')
@section('titulo')
    <a href="{{ route('cursos') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Registrar nuevo curso
@endsection

@section('contenedor')

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <div class="flash-message"> 
            @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
             @if(Session::has('alert-' . $msg)) 
        
             <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
             @endif 
            @endforeach 
        </div> <!-- end .flash-message -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de registro</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="{{ route('cursos.crear.nuevo')}}" accept-charset="UTF-8" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
            
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            {!! $errors->first('nombre','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese nombre del curso" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="plan">Plan</label> 
                            {!! $errors->first('plan','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="plan" name="plan">
                                    @foreach ($planes as $item)
                                        <option value={{$item->id}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="categoria">Grupo</label> 
                            {!! $errors->first('categoria','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="categoria" name="categoria">
                                    @foreach ($categoria as $item)
                                        <option value={{$item->id}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="col-sm-2">
                            <label for="plan">Gratis?</label> 
                            {!! $errors->first('free','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="free" name="free">
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        -->
                        <div class="col-sm-3">
                            <label for="desde">Desde?</label> 
                            {!! $errors->first('desde','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                               <input type="date" class="form-control" id="desde" name="desde" value="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="plan">Anulado</label> 
                            {!! $errors->first('anulado','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="anulado" name="anulado">
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="plan">Descripción</label> 
                            {!! $errors->first('descripcion','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <textarea class="ckeditor" name="descripcion" id="descripcon"  rows="20"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            {!! $errors->first('tutor','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="tutor" name="tutor" value="{{ old('tutor') }}" placeholder="Ingrese nombre del tutor" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('costo','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="costo" name="costo" value="{{ old('costo') }}" placeholder="Ingrese costo" maxlength="100" required>
                               
                            </div>
                        </div>

                        <div class="col-sm-12">
                            {!! $errors->first('archivo','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo" name="archivo" required>
                               
                            </div>
                        </div>
                        
                        
                    </div>
                </div>             
            </div>
            
          </div>
          <!-- /.card-body -->
    
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </form>
    </div>
    </div>
    
    </div>

@endsection

@section('script-abajo')
<script src="{{ asset('editor/ckeditor.js') }}"></script>

@endsection