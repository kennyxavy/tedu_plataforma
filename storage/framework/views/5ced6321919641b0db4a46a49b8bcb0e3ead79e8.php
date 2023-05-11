<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    <h3 class="text-center">Solicitud de retiro de dinero</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
    <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>
                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

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
                            <p>Las solicitudes de retiro tienen un costo adicional, por lo que el valor de su depósito sera
                                menor al retirado.</p>
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
                <form role="form" method="POST" action="<?php echo e(route('monedero.solicitudretiro')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body col-sm-10">
                        <div class="form-group">
                            <h4>Saldo Actual: $ <?php echo e(session('saldoCuenta')); ?></h4>
                            <br>
                            <label for="cantidad">Datos de Cuenta Bancaria</label>
                            <div class="col-sm-10">
                                <?php echo $errors->first('banco_benificiario', '<span class="help-block text-danger">:message</span>'); ?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="banco_benificiario"
                                        name="banco_benificiario" value="<?php echo e(old('banco_benificiario')); ?>"
                                        placeholder="Nombre de Banco" maxlength="100" required>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <?php echo $errors->first('tipo_cta', '<span class="help-block text-danger">:message</span>'); ?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="tipo_cta" name="tipo_cta"
                                        value="<?php echo e(old('tipo_cta')); ?>" placeholder="Tipo de Cuenta Bancaria" maxlength="100"
                                        required>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <?php echo $errors->first('num_cta_bancaria', '<span class="help-block text-danger">:message</span>'); ?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="num_cta_bancaria" name="num_cta_bancaria"
                                        value="<?php echo e(old('num_cta_bancaria')); ?>" placeholder="Número de Cuenta bancaria"
                                        maxlength="100" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="cantidad">Cantidad a retirar</label>
                                <?php echo $errors->first('cantidad', '<span class="help-block text-danger">:message</span>'); ?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" value=""
                                        placeholder="Cantidad a retirar">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <?php echo $errors->first('archivo', '<span class="help-block text-danger">:message</span>'); ?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input class="form-control" type="file" id="archivo" name="archivo" required>
                                </div>
                                <small>Por favor, adjuntar la factura del usuario de la Cuenta TEDÜ.</small>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-block btn-danger"><i class="fas fa-save"></i>
                Generar Solicitud</button>
        </div>
        </form>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views/monedero/retiro.blade.php ENDPATH**/ ?>