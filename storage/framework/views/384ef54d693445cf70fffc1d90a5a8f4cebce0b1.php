<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Configuraciones Generales
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-11">
            <div class="flash-message">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>
                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#"
                                class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> <!-- end .flash-message -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de parametrización para Productos de Market Place</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" method="POST" action="<?php echo e(route('configuraciones.guardar')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="porcentajeventa">% de ganancia sobre la venta</label>
                                        <?php echo $errors->first('porcentajeventa', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="porcentajeventa"
                                                name="porcentajeventa" value="<?php echo e($datos->porcentajeganancia); ?>"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="cgye">$ Costo de envío Guayaquil</label>
                                        <?php echo $errors->first('cgye', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="cgye" name="cgye"
                                                value="<?php echo e($datos->costoenvio1); ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="cotras">$ Costo de envío otras provincias</label>
                                        <?php echo $errors->first('cotras', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="cotras" name="cotras"
                                                value="<?php echo e($datos->costoenvio2); ?>" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="porcentajeretiro">% de afectación por retiro</label>
                                        <?php echo $errors->first('porcentajeretiro', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="porcentajeretiro"
                                                name="porcentajeretiro" value="<?php echo e($datos->porcentajeretiro); ?>"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="porcentajementor">% comisión mentor ventas</label>
                                        <?php echo $errors->first('porcentajementor', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="porcentajementor"
                                                name="porcentajementor" value="<?php echo e($datos->porcentajementor); ?>"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <!--
                            <div class="col-sm-4">
                                <label for="porcentajedescventa">% de descuento por referencia venta</label>
                                <?php echo $errors->first('porcentajedescventa', '<span class="help-block text-danger">:message</span>'); ?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                    </div>
                                        <input type="text" class="form-control" id="porcentajedescventa" name="porcentajedescventa" value="<?php echo e($datos->porcentajedescventa); ?>" placeholder="" >
                                </div>
                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-block btn-outline-primary"><i
                                            class="fas fa-save"></i> Guardar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Configuraciones\index.blade.php ENDPATH**/ ?>