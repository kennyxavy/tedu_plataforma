
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('categoriacursos')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
      Registrar nuevo grupo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-6">
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
        
        <form  role="form" method="POST" action="<?php echo e(route('categoriacursos.crear.nuevo')); ?>">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">
            
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $errors->first('nombre','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-id-card"></i></span>
                            </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>" placeholder="Ingrese nombre de la categoria" maxlength="30" required>
                               
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
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\CursosCategoria\crear.blade.php ENDPATH**/ ?>