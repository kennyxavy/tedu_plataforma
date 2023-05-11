@extends('themes/lte/layaout')
@section('titulo')
    <a href="{{ route('categoriacursos') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Editar grupo de cursos
@endsection

@section('contenedor')

<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <div class="flash-message"> 
            @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
             @if(Session::has('alert-' . $msg)) 
        
             <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
             @endif 
            @endforeach 
        </div> <!-- end .flash-message -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de actualización</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="{{ route('categoriacursos.editar.nuevo')}}">
          @csrf
          <div class="card-body">
            <div class="form-group">
            
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            {!! $errors->first('nombre','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-id-card"></i></span>
                            </div>
                                <input type="hidden" value="{{ $datos[0]->id }}" id="idcategoria" name="idcategoria">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $datos[0]->nombre }}" placeholder="Ingrese nombre de la categoria" maxlength="30" required>
                               
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