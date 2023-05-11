@extends('themes/lte/layaout')
@section('cabecera')
<link rel="stylesheet" href="{{asset('css/video.css')}}">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('titulo')
    Cursos TEDU ACADEMY
@endsection

@section('contenedor')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <a href="{{ route('listadocursos') }}" class="btn btn-secondary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
                @if (isset($modulos[0]->nombrecurso))
                    Módulos del curso - {{strtoupper($modulos[0]->nombrecurso)}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Más info!
                    </button>
                @else
                    Módulos del curso
                @endif
                
              </h3>
              
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-5 col-sm-3">
                  <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($modulos as $item)
                        <a class="nav-link" id="vert-tabs-home-tab" data-toggle="pill" href="#tab{{$item->id}}" role="tab" aria-controls="#tab{{$item->id}}">{{$item->nombre}}</a>
                    @endforeach
                    @php
                        $valida=0;
                        $cuenta=0;
                    @endphp
                    @if (isset($finalizado))
                        @foreach ($finalizado as $item2)
                            @if ($item2->fin==0)
                                @php
                                    $cuenta=$cuenta+1;
                                @endphp
                            @endif
                        @endforeach

                        @if (count($finalizado)==0)
                            @php
                                $cuenta=1;
                            @endphp
                        @endif
              
                        <br>
                        <div class="col-sm-6">
                            @if ($cuenta>0)
                                <button type="button" class="btn btn-outline-secondary btn-block" disabled data-toggle="tooltip" data-placement="top" title="Se habilitará una vez haya culminado todos los módulos."><i class="fa fa-graduation-cap" aria-hidden="true"></i> Diploma</button>
                            @else
                                <a href="{{ url('generadiploma/'.$modulos[0]->nombrecurso)}}" class="btn btn-warning pull-right"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Diploma</a>
                            @endif
                        </div>
                    @endif
                    
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
                                <div class="text-center"><h2>{{$item2->nombre}}</h2></div>
                                <div class="icheck-primary d-inline">
                                    @if ($item2->finalizado==1)
                                        <input type="checkbox" id="checkboxPrimary1_{{$item2->id}}" name="checkboxPrimary1_{{$item2->id}}" onclick='guardardatos("checkboxPrimary1_{{$item2->id}}","{{Auth()->user()->id}}","{{$item2->id}}")' checked>
                                    @else
                                        <input type="checkbox" id="checkboxPrimary1_{{$item2->id}}" name="checkboxPrimary1_{{$item2->id}}" onclick='guardardatos("checkboxPrimary1_{{$item2->id}}","{{Auth()->user()->id}}","{{$item2->id}}")'>
                                    @endif
                                    <label for="checkboxPrimary1">
                                        Ha culminado el módulo?, por favor marque esta casilla.
                                    </label>
                                   
                                </div>
                                <div class="videoWrapper">
                                    <video controls disablepictureinpicture controlsList="nodownload">
                                        <source src="{{$item2->linkvideo}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div name="detallemodulo{{$item2->id}}" id="detallemodulo{{$item2->id}}">
                                    @php
                                        echo($item2->detalle);
                                    @endphp
                                </div>
                                <!--
                                <textarea class="ckeditor form-control" name="detallemodulo{{$item2->id}}" id="detallemodulo{{$item2->id}}"  rows="20">{{$item2->detalle}}</textarea>
                                -->
                            </div>
                        @else
                            <div class="tab-pane fade" id="tab{{$item2->id}}" role="tabpanel" aria-labelledby="vert-tabs-home-tab"{{$item2->id}}>
                                <div class="text-center"><h2>{{$item2->nombre}}</h2></div>  
                                <div class="icheck-primary d-inline">
                                    @if ($item2->finalizado==1)
                                        <input type="checkbox" id="checkboxPrimary1_{{$item2->id}}" name="checkboxPrimary1_{{$item2->id}}" onclick='guardardatos("checkboxPrimary1_{{$item2->id}}","{{Auth()->user()->id}}","{{$item2->id}}")' checked>
                                    @else
                                        <input type="checkbox" id="checkboxPrimary1_{{$item2->id}}" name="checkboxPrimary1_{{$item2->id}}" onclick='guardardatos("checkboxPrimary1_{{$item2->id}}","{{Auth()->user()->id}}","{{$item2->id}}")'>
                                    @endif
                                    <label for="checkboxPrimary1">
                                        Ha culminado el módulo?, por favor marque esta casilla.
                                    </label>
                                   
                                </div>  
                                <div class="videoWrapper">   
                                    <video controls disablepictureinpicture controlsList="nodownload">
                                        <source src="{{$item2->linkvideo}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div name="detallemodulo{{$item2->id}}" id="detallemodulo{{$item2->id}}">
                                    @php
                                        echo($item2->detalle);
                                    @endphp
                                </div>
                                <!--<textarea class="ckeditor form-control" name="detallemodulo{{$item2->id}}" id="detallemodulo{{$item2->id}}"  rows="100">{{$item2->detalle}}</textarea>
                                -->
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            @if (isset($modulos[0]->nombrecurso))
            <h5 class="modal-title" id="exampleModalLabel"><strong>{{strtoupper($modulos[0]->nombrecurso)}}</strong></h5>
            @else
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            @endif
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if (isset($modulos[0]->nombrecurso))
                @php
                    echo($modulos[0]->descripcion);
                @endphp
            @else
                
            @endif
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script-abajo')
<script src="{{ asset('editor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#videoElementID').bind('contextmenu',function() { return false; });
    });
</script>
<script>
function guardardatos(id,idusuario,idmodulo){
    const checkbox = document.getElementById(id)
    
    checkbox.addEventListener('change', (event) => {
    if (event.currentTarget.checked) {
        //alert('checked');

        $.ajax({
            url: "{{route('modulos.finalizar')}}",
            dataType: "json",
            data: {
              idusuario:idusuario,
              idmodulo:idmodulo,
              opcion:"crear"
            },
            success: function(data)
            {
               console.log(data);
               Swal.fire(
                'Módulo finalizado con éxito!',
                'Continuar estudiando...',
                'success'
                )
                location.reload();
            }
        });

    } else {
        //alert('not checked');
        $.ajax({
            url: "{{route('modulos.finalizar')}}",
            dataType: "json",
            data: {
              idusuario:idusuario,
              idmodulo:idmodulo,
              opcion:"eliminar"
            },
            success: function(data)
            {
               console.log(data);
               Swal.fire(
                'Módulo aun no finalizado',
                'Continuar estudiando...',
                'success'
                )
                location.reload();
            }
        });
    }
    })
}

</script>
@endsection