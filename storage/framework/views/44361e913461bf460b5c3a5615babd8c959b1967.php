
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('cursos')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Registrar nuevo curso
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
          <h3 class="card-title">Formulario de registro</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="<?php echo e(route('cursos.crear.nuevo')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>" placeholder="Ingrese nombre del curso" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="plan">Plan</label> 
                            <?php echo $errors->first('plan','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="plan" name="plan">
                                    <?php $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
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
                                        <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
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
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        -->
                        <div class="col-sm-3">
                            <label for="desde">Desde?</label> 
                            <?php echo $errors->first('desde','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                               <input type="date" class="form-control" id="desde" name="desde" value="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="plan">Anulado</label> 
                            <?php echo $errors->first('anulado','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="anulado" name="anulado">
                                    <option value="1">SI</option>
                                    <option value="0" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="plan">Descripción</label> 
                            <?php echo $errors->first('descripcion','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <textarea class="ckeditor" name="descripcion" id="descripcon"  rows="20"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <?php echo $errors->first('tutor','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="tutor" name="tutor" value="<?php echo e(old('tutor')); ?>" placeholder="Ingrese nombre del tutor" maxlength="100" required>
                               
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $errors->first('costo','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"></span>
                            </div>
                                <input type="text" class="form-control" id="costo" name="costo" value="<?php echo e(old('costo')); ?>" placeholder="Ingrese costo" maxlength="100" required>
                               
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <?php echo $errors->first('archivo','<span class="help-block text-danger">:message</span>'); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>
<script src="<?php echo e(asset('editor/ckeditor.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Cursos\crear.blade.php ENDPATH**/ ?>