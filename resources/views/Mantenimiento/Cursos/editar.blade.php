@extends('themes/lte/layaout')
@section('titulo')
    <a href="{{ route('cursos') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Editar curso
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
          <h3 class="card-title">Formulario de actualización</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="{{ route('cursos.editar.nuevo')}}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                <input type="hidden" value={{$datos[0]->id}} id="idcurso" name="idcurso">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $datos[0]->nombre }}" placeholder="Ingrese nombre del curso" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="plan">Plan</label> 
                            {!! $errors->first('plan','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                                <select class="form-control" id="plan" name="plan">
                                    @foreach ($planes as $item)
                                        @if ($datos[0]->plan_id==$item->id)
                                            <option value={{$item->id}} selected>{{$item->nombre}}</option>
                                        @else
                                            <option value={{$item->id}}>{{$item->nombre}}</option>
                                        @endif
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
                                        @if ($datos[0]->categoria_cursos_id==$item->id)
                                            <option value={{$item->id}} selected>{{$item->nombre}}</option>
                                        @else
                                            <option value={{$item->id}}>{{$item->nombre}}</option>
                                        @endif
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
                                    @if ($datos[0]->free==1)
                                        <option value="1" selected>SI</option>
                                        <option value="0">NO</option>
                                    @else
                                        <option value="1">SI</option>
                                        <option value="0" selected>NO</option>
                                    @endif                                   
                                </select>
                            </div>
                        </div>
                        -->
                        <div class="col-sm-3">
                            <label for="desde">Desde?</label> 
                            {!! $errors->first('desde','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                               <input type="date" class="form-control" id="desde" name="desde" value={{$datos[0]->fecha_desde}}>
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
                        <div class="col-sm-12">
                            <label for="plan">Descripción</label> 
                            {!! $errors->first('descripcion','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3" >
                                <textarea class="ckeditor form-control" name="descripcion" id="descripcon"  rows="20">{{$datos[0]->descripcion}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            {!! $errors->first('tutor','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="tutor" name="tutor" value="{{ $datos[0]->tutor }}" placeholder="Ingrese nombre del tutor" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('costo','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="costo" name="costo" value="{{ $datos[0]->costo }}" placeholder="Ingrese costo" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            {!! $errors->first('archivo','<span class="help-block text-danger">:message</span>') !!}
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input class="form-control" type="file" id="archivo" name="archivo" >
                               
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalModulo">
                        Agregar
                    </button>
                    Módulos del curso
                  </h3>
                  
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-5 col-sm-3">
                      <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($modulos as $item)
                            <a class="nav-link" id="vert-tabs-home-tab" data-toggle="pill" href="#tab{{$item->id}}" role="tab" aria-controls="#tab{{$item->id}}">{{$item->nombre}}</a>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-7 col-sm-9">
                      <div class="tab-content" id="vert-tabs-tabContent">
                        @php
                            $cuenta=1;
                        @endphp
                        @foreach ($modulos as $item2)
                            @if ($cuenta==1)
                                <div class="tab-pane text-left fade show active" id="tab{{$item2->id}}" role="tabpanel" aria-labelledby="vert-tabs-home-tab"{{$item2->id}}>
                                    <textarea class="ckeditor form-control" name="detallemodulo{{$item2->id}}" id="detallemodulo{{$item2->id}}"  rows="20">{{$item2->detalle}}</textarea>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalmodulodetalle" onclick="callmodal('{{$item2->id}}')">Editar</button>
                                </div>
                            @else
                                <div class="tab-pane fade" id="tab{{$item2->id}}" role="tabpanel" aria-labelledby="vert-tabs-home-tab"{{$item2->id}}>
                                    <textarea class="ckeditor form-control" name="detallemodulo{{$item2->id}}" id="detallemodulo{{$item2->id}}"  rows="20">{{$item2->detalle}}</textarea>
                                    
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalmodulodetalle" onclick="callmodal('{{$item2->id}}')">Editar</button>
                                </div>
                            @endif
                            @php
                                $cuenta=$cuenta+1;
                            @endphp                    
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
        </div>
    </div>
    
</div>
<div class="modal fade" id="modalModulo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar módulo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="{{ route('modulos.crear.nuevo')}}" accept-charset="UTF-8">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" value="{{$datos[0]->id}}" id="idcurso2" name="idcurso2">
                    <label for="nombremodulo">Nombre:</label>
                    <input type="text" class="form-control" value="" id="nombremodulo" name="nombremodulo" placeholder="Nombre de módulo" required>
                </div>    
                <div class="col-sm-12">
                    <label for="detallemodulo">Detalle</label> 
                    {!! $errors->first('detallemodulo','<span class="help-block text-danger">:message</span>') !!}
                    <div class="input-group mb-3" >
                        <textarea class="ckeditor form-control" name="detallemodulo" id="detallemodulo"  rows="20" required></textarea>
                    </div>
                </div> 
                <div class="col-sm-12">
                    <label for="nombremodulo">Link de video:</label>
                    <input type="text" class="form-control" value="" id="linkvideo" name="linkvideo" placeholder="Link de video" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>

          </form>
        </div>
        <div class="modal-footer justify-content-between">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modalmodulodetalle">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edición del módulo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="{{ route('modulos.editar.nuevo')}}" accept-charset="UTF-8">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" value="{{$datos[0]->id}}" id="idcurso3" name="idcurso3">
                    <label for="enombremodulo">Nombre:</label>
                    <input type="text" class="form-control" value="" id="enombremodulo" name="enombremodulo" placeholder="Nombre de módulo" required>
                </div>    
                <div class="col-sm-12">
                    <label for="edetallemodulo">Detalle</label> 
                    {!! $errors->first('edetallemodulo','<span class="help-block text-danger">:message</span>') !!}
                    <div class="input-group mb-3" >
                        <textarea class="ckeditor form-control" name="edetallemodulo" id="edetallemodulo"  rows="20" required></textarea>
                    </div>
                </div> 
                <div class="col-sm-12">
                    <label for="elinkvideo">Link de video:</label>
                    <input type="text" class="form-control" value="" id="elinkvideo" name="elinkvideo" placeholder="Link de video" required>
                </div>
                <div class="col-sm-3">
                    <label for="eanuladomodulo">Anulado</label> 
                    {!! $errors->first('eanuladomodulo','<span class="help-block text-danger">:message</span>') !!}
                    <div class="input-group mb-3">
                        <select class="form-control" id="eanuladomodulo" name="eanuladomodulo">
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                                                     
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>

          </form>
        </div>
        <div class="modal-footer justify-content-between">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('script-abajo')
<script src="{{ asset('editor/ckeditor.js') }}"></script>
<script>
    document.getElementById("idcurso").addEventListener('oninput', autoCompleteNew);

    function autoCompleteNew(e) {            
        var value = $(this).val();         
        $("#idcurso2").val(value); 
    }
</script>
<script>
     function callmodal(ingreso) {
        //$("#detallehonorarios").children().remove();
        //document.getElementById("nombremedico").innerHTML = "Detalle de Honorarios - "+nommedico;
        var d="";
        console.log(ingreso);
        $.ajax({
            url: "{{route('modulos.buscarmodulos')}}",
            dataType: "json",
            data: {
              ningreso:ingreso
            },
            success: function(data)
            {
               console.log(data);
               document.getElementById("idcurso3").value=data[0].id;
               document.getElementById("enombremodulo").value=data[0].nombre;
               CKEDITOR.instances['edetallemodulo'].setData(data[0].detalle)
               //document.getElementById("edetallemodulo").innerHTML=data[0].detalle;
               document.getElementById("elinkvideo").value=data[0].linkvideo;
               if (data[0].anulado==0)
               {
                    document.getElementById("eanuladomodulo").value = "0";
               }else{
                    document.getElementById("eanuladomodulo").value = "1";
               }
                //$("#detallehonorarios").append(d);
            }
        });

        $('#modalmodulodetalle').modal();
    }
</script>
@endsection