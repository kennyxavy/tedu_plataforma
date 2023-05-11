<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
Mi código de referencia es: <strong><?php echo e(Auth()->user()->micodigo); ?></strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
<div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-bullhorn"></i>
           Información importante!!
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        
        <div class="callout callout-info">
          <h5>Compra de planes TEDU!</h5>

          <p>Por favor sirvase a llenar los campos restante del presente formulario para continuar con la compra.</p>
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-11">
        <div class="flash-message"> 
            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
             <?php if(Session::has('alert-' . $msg)): ?> 
        
             <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
             <?php endif; ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div> <!-- end .flash-message -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de actualización de datos</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="<?php echo e(route('comprarplan.actualizar')); ?>">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">                
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="cedula">DNI/Cédula</label>

                            <?php echo $errors->first('cedula','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo e(Auth()->user()->dni); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre">Nombres</label> 

                            <?php echo $errors->first('nombres','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo e(Auth()->user()->name); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="nacimiento">Nacimiento</label> 

                            <?php echo $errors->first('nace','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="date" class="form-control" id="nace" name="nace" value="<?php echo e(Auth()->user()->fnacimiento); ?>" placeholder="Nacimiento">
                            </div>
                        </div>
                    </div> 
                     
                    
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="correo">Correo</label>

                            <?php echo $errors->first('correo','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="correo" name="correo" value="<?php echo e(Auth()->user()->email); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <label for="direccion">Dirección</label> 

                            <?php echo $errors->first('direccion','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e(Auth()->user()->direccion); ?>" placeholder="">
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="mentor">Código de Referido</label> 

                            <?php echo $errors->first('mentor','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="mentor" name="mentor" value="<?php echo e(Auth()->user()->codmentor); ?>" placeholder="Cod. Referido">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="telefono">Teléfono</label> 

                            <?php echo $errors->first('telefono','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo e(Auth()->user()->celular); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-check">
                                <?php if(Auth()->user()->aceptatermino==1): ?>
                                    <input class="form-check-input" name="termino" id="termino" type="checkbox" checked>
                                <?php else: ?>
                                    <input class="form-check-input" name="termino" id="termino" type="checkbox">
                                <?php endif; ?>
                                <label class="form-check-label">Acepta términos y condiciones TEDU para la suscripción PRO?</label>
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
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Actualizar mis datos</button>
                    </div>
                   
                    <div class="col-sm-6">
                        <?php if(Auth()->user()->datosupdate==1): ?>
                            <a href="<?php echo e(route('comprarplan.pago')); ?>"><button type="button" class="btn btn-warning" >Proceder al pago</button></a>    
                        <?php else: ?>
                            <a href="#"><button type="button" class="btn btn-warning" disabled>Por favor actualice primero la información..</button></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>    
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\planes\comprar.blade.php ENDPATH**/ ?>