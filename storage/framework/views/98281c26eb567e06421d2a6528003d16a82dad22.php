<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('recargas')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Solicitud de recarga de dinero
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
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
                    <h3 class="card-title">Formulario de solicitud</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" method="POST" action="<?php echo e(route('recargas.crear.nuevo')); ?>" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php echo $errors->first('detalle', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input type="text" class="form-control" id="detalle" name="detalle"
                                                value="<?php echo e(old('detalle')); ?>" placeholder="Ingrese detalle de solicitud"
                                                maxlength="100" required>

                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <?php echo $errors->first('procedencia', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input type="text" class="form-control" id="procedencia" name="procedencia"
                                                value="<?php echo e(old('procedencia')); ?>" placeholder="Banco procedencia"
                                                maxlength="100" required>

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <?php echo $errors->first('costo', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input type="text" class="form-control" id="costo" name="costo"
                                                value="<?php echo e(old('costo')); ?>" placeholder="Ingrese valor" maxlength="100"
                                                required>

                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <?php echo $errors->first('archivo', '<span class="help-block text-danger">:message</span>'); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input class="form-control" type="file" id="archivo" name="archivo"
                                                required>
                                        </div>
                                        <small>Por favor, adjuntar el documento o imagen del comprobante de transferencia o
                                            deposito.</small>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i>
                            Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>
    <script src="<?php echo e(asset('editor/ckeditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views/monedero/solicitud.blade.php ENDPATH**/ ?>