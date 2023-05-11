<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Usuarios registrados en el sistema
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

                <th>DNI</th>
                <th>Nombre</th>
                <th>MiCodigo</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Referido</th>
                <th>F.Ingreso</th>
                <th>Perfil</th>
                <th>Plan</th>
                <th>Editar</th>

            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($item->dni); ?></td>
                    <td><?php echo e($item->nombres . ' ' . $item->apellidos); ?></td>
                    <td><?php echo e($item->micodigo); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e($item->celular); ?></td>
                    <td><?php echo e($item->codmentor); ?></td>
                    <td><?php echo e($item->created_at); ?></td>
                    <td><?php echo e($item->categoria); ?></td>
                    <td><?php echo e($item->plan); ?></td>
                    <td><a href="<?php echo e(url('usuarios/editar/' . $item->id)); ?>" class="btn btn-warning pull-center"><i
                                class="fas fa-user-edit"></i> </a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Usuarios\index.blade.php ENDPATH**/ ?>