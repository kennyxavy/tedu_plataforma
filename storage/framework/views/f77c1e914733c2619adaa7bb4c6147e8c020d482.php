
<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Autorización de productos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="flash-message"> 
  <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
   <?php if(Session::has('alert-' . $msg)): ?> 

   <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   <?php endif; ?> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div> <!-- end .flash-message -->
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Usuario</th>
      <th>Categoria</th>
      <th>Producto</th> 
      <th>Precio</th>  
      <th>Estado</th>
      <th>Ver</th>
    </tr>
    </thead>
    <tbody>
      
      <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->usuario); ?></td>
            <td><?php echo e($item->categoria); ?></td>
            <td><?php echo e($item->nombre); ?></td>
            <td><?php echo e($item->precio); ?></td>
            <?php if($item->autorizado==1): ?>
            <td><span class='badge badge-success'>Autorizado</span></td>
            <?php else: ?>
            <td><span class='badge badge-danger'>Sin autorización</span></td>
            <?php endif; ?>
            <td><a href="<?php echo e(url('productos/ver/'.Crypt::encrypt($item->id))); ?>" class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </tbody>
</table>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Productos\aprobar.blade.php ENDPATH**/ ?>