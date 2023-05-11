
<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Planes registrados en el sistema
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
<div>
    <a href="<?php echo e(route('planes.crear')); ?>" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>  Añadir</a>
</div>
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
      <th>IDs</th>
      <th>Nombre</th>
      <th>Descripcion</th>  
      <th>Valor</th>  
      <th>Editar</th>
      <th>Anular</th>

    </tr>
    </thead>
    <tbody>
    
      <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e($item->nombre); ?></td>
            <td><?php echo e($item->descripcion); ?></td>
            <td><?php echo e($item->valor); ?></td>
            <td><a href="<?php echo e(url('planes/editar/'.Crypt::encrypt($item->id))); ?>" class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
            <td><a href="<?php echo e(url('planes/anular/'.Crypt::encrypt($item->id))); ?>" class="btn btn-danger pull-center" onclick="return confirm('Estas seguro de anular el registro?')"><i class="fas fa-times"></i> </a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </tbody>
</table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Planes\index.blade.php ENDPATH**/ ?>