
<?php $__env->startSection('cabecera'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/video.css')); ?>">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    Cursos TEDU ACADEMY
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?php echo e(route('listadocursos')); ?>" class="btn btn-secondary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
                <?php if(isset($modulos[0]->nombrecurso)): ?>
                    Módulos del curso - <?php echo e(strtoupper($modulos[0]->nombrecurso)); ?>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Más info!
                    </button>
                <?php else: ?>
                    Módulos del curso
                <?php endif; ?>
                
              </h3>
              
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-5 col-sm-3">
                  <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                    <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="nav-link" id="vert-tabs-home-tab" data-toggle="pill" href="#tab<?php echo e($item->id); ?>" role="tab" aria-controls="#tab<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $valida=0;
                        $cuenta=0;
                    ?>
                    <?php if(isset($finalizado)): ?>
                        <?php $__currentLoopData = $finalizado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item2->fin==0): ?>
                                <?php
                                    $cuenta=$cuenta+1;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if(count($finalizado)==0): ?>
                            <?php
                                $cuenta=1;
                            ?>
                        <?php endif; ?>
              
                        <br>
                        <div class="col-sm-6">
                            <?php if($cuenta>0): ?>
                                <button type="button" class="btn btn-outline-secondary btn-block" disabled data-toggle="tooltip" data-placement="top" title="Se habilitará una vez haya culminado todos los módulos."><i class="fa fa-graduation-cap" aria-hidden="true"></i> Diploma</button>
                            <?php else: ?>
                                <a href="<?php echo e(url('generadiploma/'.$modulos[0]->nombrecurso)); ?>" class="btn btn-warning pull-right"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Diploma</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
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
                                <div class="text-center"><h2><?php echo e($item2->nombre); ?></h2></div>
                                <div class="icheck-primary d-inline">
                                    <?php if($item2->finalizado==1): ?>
                                        <input type="checkbox" id="checkboxPrimary1_<?php echo e($item2->id); ?>" name="checkboxPrimary1_<?php echo e($item2->id); ?>" onclick='guardardatos("checkboxPrimary1_<?php echo e($item2->id); ?>","<?php echo e(Auth()->user()->id); ?>","<?php echo e($item2->id); ?>")' checked>
                                    <?php else: ?>
                                        <input type="checkbox" id="checkboxPrimary1_<?php echo e($item2->id); ?>" name="checkboxPrimary1_<?php echo e($item2->id); ?>" onclick='guardardatos("checkboxPrimary1_<?php echo e($item2->id); ?>","<?php echo e(Auth()->user()->id); ?>","<?php echo e($item2->id); ?>")'>
                                    <?php endif; ?>
                                    <label for="checkboxPrimary1">
                                        Ha culminado el módulo?, por favor marque esta casilla.
                                    </label>
                                   
                                </div>
                                <div class="videoWrapper">
                                    <video controls disablepictureinpicture controlsList="nodownload">
                                        <source src="<?php echo e($item2->linkvideo); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div name="detallemodulo<?php echo e($item2->id); ?>" id="detallemodulo<?php echo e($item2->id); ?>">
                                    <?php
                                        echo($item2->detalle);
                                    ?>
                                </div>
                                <!--
                                <textarea class="ckeditor form-control" name="detallemodulo<?php echo e($item2->id); ?>" id="detallemodulo<?php echo e($item2->id); ?>"  rows="20"><?php echo e($item2->detalle); ?></textarea>
                                -->
                            </div>
                        <?php else: ?>
                            <div class="tab-pane fade" id="tab<?php echo e($item2->id); ?>" role="tabpanel" aria-labelledby="vert-tabs-home-tab"<?php echo e($item2->id); ?>>
                                <div class="text-center"><h2><?php echo e($item2->nombre); ?></h2></div>  
                                <div class="icheck-primary d-inline">
                                    <?php if($item2->finalizado==1): ?>
                                        <input type="checkbox" id="checkboxPrimary1_<?php echo e($item2->id); ?>" name="checkboxPrimary1_<?php echo e($item2->id); ?>" onclick='guardardatos("checkboxPrimary1_<?php echo e($item2->id); ?>","<?php echo e(Auth()->user()->id); ?>","<?php echo e($item2->id); ?>")' checked>
                                    <?php else: ?>
                                        <input type="checkbox" id="checkboxPrimary1_<?php echo e($item2->id); ?>" name="checkboxPrimary1_<?php echo e($item2->id); ?>" onclick='guardardatos("checkboxPrimary1_<?php echo e($item2->id); ?>","<?php echo e(Auth()->user()->id); ?>","<?php echo e($item2->id); ?>")'>
                                    <?php endif; ?>
                                    <label for="checkboxPrimary1">
                                        Ha culminado el módulo?, por favor marque esta casilla.
                                    </label>
                                   
                                </div>  
                                <div class="videoWrapper">   
                                    <video controls disablepictureinpicture controlsList="nodownload">
                                        <source src="<?php echo e($item2->linkvideo); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div name="detallemodulo<?php echo e($item2->id); ?>" id="detallemodulo<?php echo e($item2->id); ?>">
                                    <?php
                                        echo($item2->detalle);
                                    ?>
                                </div>
                                <!--<textarea class="ckeditor form-control" name="detallemodulo<?php echo e($item2->id); ?>" id="detallemodulo<?php echo e($item2->id); ?>"  rows="100"><?php echo e($item2->detalle); ?></textarea>
                                -->
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <?php if(isset($modulos[0]->nombrecurso)): ?>
            <h5 class="modal-title" id="exampleModalLabel"><strong><?php echo e(strtoupper($modulos[0]->nombrecurso)); ?></strong></h5>
            <?php else: ?>
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <?php endif; ?>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php if(isset($modulos[0]->nombrecurso)): ?>
                <?php
                    echo($modulos[0]->descripcion);
                ?>
            <?php else: ?>
                
            <?php endif; ?>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>
<script src="<?php echo e(asset('editor/ckeditor.js')); ?>"></script>
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
            url: "<?php echo e(route('modulos.finalizar')); ?>",
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
            url: "<?php echo e(route('modulos.finalizar')); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Cursos\detallecurso.blade.php ENDPATH**/ ?>