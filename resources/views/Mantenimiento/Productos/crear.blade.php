@extends('themes/lte/layaout')
@section('titulo')
    <a href="{{ route('productos') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Registrar nuevo producto
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
        
        <form  role="form" method="POST" action="{{ route('productos.crear.nuevo')}}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese nombre del producto" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="categoria">Categoria</label> 
                            {!! $errors->first('categoria','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="categoria" name="categoria">
                                    @foreach ($categoria as $item)
                                        <option value={{$item->id}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="subcategoria">SubCategoria</label> 
                            {!! $errors->first('subcategoria','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="subcategoria" name="subcategoria">
                                    @foreach ($subcategoria as $item)
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
                        <div class="col-sm-2">
                            <label for="publicar">Publicar</label> 
                            {!! $errors->first('publicar','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="publicar" name="publicar">
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
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
                                <textarea class="form-control" name="descripcion" id="descripcon"  rows="7"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="otros">Otros detalles</label> 
                            {!! $errors->first('otros','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="otros" id="otros"  rows="6"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('marca','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}" placeholder="Marca" maxlength="100" required>
                               
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
                        <div class="col-sm-4">
                            {!! $errors->first('precio','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" placeholder="Ingrese precio" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('descuentoreferencia','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="descuentoreferencia" name="descuentoreferencia" value="{{ old('descuentoreferencia') }}" placeholder="Descuento x Ref." maxlength="100" required>                               
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="archivo">Agregue imagen 1 del producto</label> 
                            {!! $errors->first('archivo','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo" name="archivo">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="archivo2">Agregue imagen 2 del producto</label> 
                            {!! $errors->first('archivo2','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo2" name="archivo2">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="plan">Agregue imagen 3 del producto</label> 
                            {!! $errors->first('archivo','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo3" name="archivo3">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="archivo4">Agregue imagen 4 del producto</label> 
                            {!! $errors->first('archivo4','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo4" name="archivo4">
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="archivo5">Agregue imagen 5 del producto</label> 
                            {!! $errors->first('archivo5','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo5" name="archivo5">
                               
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
<script>
    const csrftoken=document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('categoria').addEventListener('change',(e)=>{
        fetch("{{url('buscarsubcategoria')}}",{
            headers:{
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': csrftoken// <--- aquí el token
            },
            credentials: "same-origin",
            method:'POST',
            body:JSON.stringify({texto:e.target.value})
            
        }).then(response=>{
            return response.json()
        }).then(data=>{
            var opciones="<option value=''>Escoger subcategoria</option>";
            console.log(data);
            for (let i in data.lista) {
               opciones+='<option value='+data.lista[i].id+'>'+data.lista[i].nombre+'</option>';
            }
            document.getElementById("subcategoria").innerHTML=opciones;
        }).catch(error => console.error(error));
    })
</script>  
@endsection