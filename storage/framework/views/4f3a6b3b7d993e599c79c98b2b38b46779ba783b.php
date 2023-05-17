<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Solicitudes de retiros por aprobar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
    <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>
                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> <!-- end .flash-message -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Fecha</th>
                <th>DNI</th>
                <th>Codigo</th>
                <th>Solicitante</th>
                <th>Cantidad solicitada</th>
                <th>Estado</th>
                <th>Archivo</th>
                <th>Aprobar</th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->fecha); ?></td>
                    <td><?php echo e($item->dni); ?></td>
                    <td><?php echo e($item->micodigo); ?></td>
                    <td><?php echo e($item->solicitante); ?></td>
                    <td><?php echo e($item->valor); ?></td>
                    <?php if($item->transferido == 1): ?>
                        <td><span class='badge badge-success'>Aprobado</span></td>
                    <?php else: ?>
                        <td><span class='badge badge-warning'>Pendiente</span></td>
                    <?php endif; ?>

                    
                    <?php if($item->transferido == 1): ?>
                        <td></td>
                    <?php else: ?>
                        <td><a href="<?php echo e(url('retiros/aprobarsol/' . Crypt::encrypt($item->id))); ?>"
                                class="btn btn-info pull-center"><i class="fa fa-check-square"></i> </a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\monedero\aprobarretiro.blade.php ENDPATH**/ ?>