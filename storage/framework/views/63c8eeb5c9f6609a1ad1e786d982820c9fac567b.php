
<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Solicitud de retiro
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
<div class="flash-message"> 
  <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
   <?php if(Session::has('alert-' . $msg)): ?> 

   <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   <?php endif; ?> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div> <!-- end .flash-message -->
<div><h4>Saldo a la fecha: $ <?php echo e(session('saldoCuenta')); ?></h4></div>

<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-11">
        <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Atención
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <div class="callout callout-info">
                  <h5>Estimado usuario</h5>

                  <p>Las solicitudes de retiro tienen un costo adicional, por lo que el valor de su depósito sera menor al retirado.</p>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>  
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de solicitud de retiro</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="<?php echo e(route('monedero.solicitudretiro')); ?>">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">                
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="cantidad">Cantidad a retirar</label>
                            <?php echo $errors->first('cantidad','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" value="" placeholder="Cantidad a retirar" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="saldo">Saldo disponible</label> 

                            <?php echo $errors->first('saldo','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="saldo" name="saldo" value=<?php echo e(session('saldoCuenta')); ?> placeholder=""  readonly>
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
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Generar solicitud</button>
                    </div>
                                   
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\monedero\retiro.blade.php ENDPATH**/ ?>