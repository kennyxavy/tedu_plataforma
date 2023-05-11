
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('cursos')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Editar curso
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <div class="flash-message"> 
            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
             <?php if(Session::has('alert-' . $msg)): ?> 
        
             <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
             <?php endif; ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div> <!-- end .flash-message -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de actualización</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="<?php echo e(route('cursos.editar.nuevo')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">
            
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $errors->first('nombre','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="hidden" value=<?php echo e($datos[0]->id); ?> id="idcurso" name="idcurso">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($datos[0]->nombre); ?>" placeholder="Ingrese nombre del curso" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="plan">Plan</label> 
                            <?php echo $errors->first('plan','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="plan" name="plan">
                                    <?php $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($datos[0]->plan_id==$item->id): ?>
                                            <option value=<?php echo e($item->id); ?> selected><?php echo e($item->nombre); ?></option>
                                        <?php else: ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="categoria">Grupo</label> 
                            <?php echo $errors->first('categoria','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="categoria" name="categoria">
                                    <?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($datos[0]->categoria_cursos_id==$item->id): ?>
                                            <option value=<?php echo e($item->id); ?> selected><?php echo e($item->nombre); ?></option>
                                        <?php else: ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="col-sm-2">
                            <label for="plan">Gratis?</label> 
                            <?php echo $errors->first('free','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="free" name="free">
                                    <?php if($datos[0]->free==1): ?>
                                        <option value="1" selected>SI</option>
                                        <option value="0">NO</option>
                                    <?php else: ?>
                                        <option value="1">SI</option>
                                        <option value="0" selected>NO</option>
                                    <?php endif; ?>                                   
                                </select>
                            </div>
                        </div>
                        -->
                        <div class="col-sm-3">
                            <label for="desde">Desde?</label> 
                            <?php echo $errors->first('desde','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                               <input type="date" class="form-control" id="desde" name="desde" value=<?php echo e($datos[0]->fecha_desde); ?>>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="plan">Anulado</label> 
                            <?php echo $errors->first('anulado','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="anulado" name="anulado">
                                    <?php if($datos[0]->anulado==1): ?>
                                        <option value="1" selected>SI</option>
                                        <option value="0">NO</option>
                                    <?php else: ?>
                                        <option value="1">SI</option>
                                        <option value="0" selected>NO</option>
                                    <?php endif; ?>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="plan">Descripción</label> 
                            <?php echo $errors->first('descripcion','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3" >
                                <textarea class="ckeditor form-control" name="descripcion" id="descripcon"  rows="20"><?php echo e($datos[0]->descripcion); ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <?php echo $errors->first('tutor','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="tutor" name="tutor" value="<?php echo e($datos[0]->tutor); ?>" placeholder="Ingrese nombre del tutor" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $errors->first('costo','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="costo" name="costo" value="<?php echo e($datos[0]->costo); ?>" placeholder="Ingrese costo" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>

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
                        <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="nav-link" id="vert-tabs-home-tab" data-toggle="pill" href="#tab<?php echo e($item->id); ?>" role="tab" aria-controls="#tab<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                    <div class="col-7 col-sm-9">
                      <div class="tab-content" id="vert-tabs-tabContent">
                        <?php
                            $cuenta=1;
                        ?>
                        <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cuenta==1): ?>
                                <div class="tab-pane text-left fade show active" id="tab<?php echo e($item2->id); ?>" role="tabpanel" aria-labelledby="vert-tabs-home-tab"<?php echo e($item2->id); ?>>
                                    <textarea class="ckeditor form-control" name="detallemodulo<?php echo e($item2->id); ?>" id="detallemodulo<?php echo e($item2->id); ?>"  rows="20"><?php echo e($item2->detalle); ?></textarea>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalmodulodetalle" onclick="callmodal('<?php echo e($item2->id); ?>')">Editar</button>
                                </div>
                            <?php else: ?>
                                <div class="tab-pane fade" id="tab<?php echo e($item2->id); ?>" role="tabpanel" aria-labelledby="vert-tabs-home-tab"<?php echo e($item2->id); ?>>
                                    <textarea class="ckeditor form-control" name="detallemodulo<?php echo e($item2->id); ?>" id="detallemodulo<?php echo e($item2->id); ?>"  rows="20"><?php echo e($item2->detalle); ?></textarea>
                                    
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalmodulodetalle" onclick="callmodal('<?php echo e($item2->id); ?>')">Editar</button>
                                </div>
                            <?php endif; ?>
                            <?php
                                $cuenta=$cuenta+1;
                            ?>                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          <form role="form" method="POST" action="<?php echo e(route('modulos.crear.nuevo')); ?>" accept-charset="UTF-8">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" value="<?php echo e($datos[0]->id); ?>" id="idcurso2" name="idcurso2">
                    <label for="nombremodulo">Nombre:</label>
                    <input type="text" class="form-control" value="" id="nombremodulo" name="nombremodulo" placeholder="Nombre de módulo" required>
                </div>    
                <div class="col-sm-12">
                    <label for="detallemodulo">Detalle</label> 
                    <?php echo $errors->first('detallemodulo','<span class="help-block text-danger">:message</span>'); ?>

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
          <form role="form" method="POST" action="<?php echo e(route('modulos.editar.nuevo')); ?>" accept-charset="UTF-8">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" value="<?php echo e($datos[0]->id); ?>" id="idcurso3" name="idcurso3">
                    <label for="enombremodulo">Nombre:</label>
                    <input type="text" class="form-control" value="" id="enombremodulo" name="enombremodulo" placeholder="Nombre de módulo" required>
                </div>    
                <div class="col-sm-12">
                    <label for="edetallemodulo">Detalle</label> 
                    <?php echo $errors->first('edetallemodulo','<span class="help-block text-danger">:message</span>'); ?>

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
                    <?php echo $errors->first('eanuladomodulo','<span class="help-block text-danger">:message</span>'); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>
<script src="<?php echo e(asset('editor/ckeditor.js')); ?>"></script>
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
            url: "<?php echo e(route('modulos.buscarmodulos')); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Cursos\editar.blade.php ENDPATH**/ ?>