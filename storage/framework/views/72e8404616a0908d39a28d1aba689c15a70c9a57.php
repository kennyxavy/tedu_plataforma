<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    Mis transacciones a la fecha
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
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Detalle</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $saldo = 0;
            ?>
            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if ($item->tipo == 'ING') {
                        $saldo = $saldo + $item->valor;
                    } else {
                        $saldo = $saldo - $item->valor;
                    }
                ?>
                <tr>
                    <td><?php echo e($item->fecha); ?></td>
                    <td><?php echo e($item->tipo . '-' . str_pad($item->id, 5, '0', STR_PAD_LEFT)); ?></td>
                    <td><?php echo e($item->detalle); ?></td>
                    <?php if($item->tipo == 'EGR'): ?>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-dash-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                            </svg> <?php echo e($item->valor); ?></td>
                    <?php else: ?>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg> <?php echo e($item->valor); ?></td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
    <div>
        <h4>Saldo a la fecha: $ <?php echo e($saldo); ?></h4>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\monedero\transacciones.blade.php ENDPATH**/ ?>