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
        
        <div class="callout callout-warning">
          <h5>Datos de los usuarios!</h5>

          <p>Solo el administrador del sistema podrá asignar un plan a un usuario en especifico, asi como darle de baja en el sistema.</p>
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
          <h3 class="card-title">Formulario de usuarios</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form  role="form" method="POST" action="<?php echo e(route('usuarios.actualizar')); ?>">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">                
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="cedula">DNI/Cédula</label>
                            <input type="hidden" value="<?php echo e($datos->id); ?>" id="idusuario" name="idusuario">
                            <?php echo $errors->first('cedula','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo e($datos->dni); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre">Nombres</label> 

                            <?php echo $errors->first('nombres','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo e($datos->name); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="nacimiento">Nacimiento</label> 

                            <?php echo $errors->first('nace','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="date" class="form-control" id="nace" name="nace" value="<?php echo e($datos->fnacimiento); ?>" placeholder="Nacimiento" readonly>
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
                                    <input type="text" class="form-control" id="correo" name="correo" value="<?php echo e($datos->email); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <label for="direccion">Dirección</label> 

                            <?php echo $errors->first('direccion','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e($datos->direccion); ?>" placeholder="" readonly>
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
                                    <input type="text" class="form-control" id="mentor" name="mentor" value="<?php echo e($datos->codmentor); ?>" placeholder="Cod. Referido" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="telefono">Teléfono</label> 

                            <?php echo $errors->first('telefono','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                </div>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo e($datos->celular); ?>" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="plan">Plan</label> 
                            <?php echo $errors->first('plan','<span class="help-block text-danger">:message</span>'); ?>

                            <div class="input-group mb-3">
                                <select class="form-control" id="plan" name="plan">
                                    <?php $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($datos['plan_id']==$item->id): ?>
                                            <option value=<?php echo e($item->id); ?> selected><?php echo e($item->nombre); ?></option>
                                        <?php else: ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->nombre); ?></option>
                                        <?php endif; ?>                                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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
                        <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Actualizar</button>
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
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Usuarios\editar.blade.php ENDPATH**/ ?>