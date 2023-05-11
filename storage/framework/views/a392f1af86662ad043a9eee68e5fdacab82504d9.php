
<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Productos para el Market
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
<div>
    <a href="<?php echo e(route('productos.crear')); ?>" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>  Añadir</a>
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
      <th>Categoria</th>
      <th>Subcategoria</th>
      <th>Producto</th> 
      <th>Precio</th> 
      <th>Utilidad</th>  
      <th>Estado</th>  
      <th>Publicado</th>  
      <th>Autorizado</th>  
      <th>Editar</th>
      <th>Anular</th>
      <th>Eliminar</th>

    </tr>
    </thead>
    <tbody>
      
      <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->categoria); ?></td>
            <td><?php echo e($item->subcategoria); ?></td>
            <td><?php echo e($item->nombre); ?></td>
            <td><?php echo e($item->precio); ?></td>
            <td><?php echo e($item->precio-$item->costo); ?></td>
            <td><span class='badge badge-info'><?php echo e($item->anulado==0?"Activo":"Inactivo"); ?></span></td>
            <td><span class='badge badge-info'><?php echo e($item->publicado==1?"Si":"NO"); ?></span></td>
            <?php if($item->autorizado==1): ?>
            <td><span class='badge badge-success'>Autorizado</span></td>
            <?php else: ?>
            <td><span class='badge badge-danger'>Sin autorización</span></td>
            <?php endif; ?>
            <td><a href="<?php echo e(url('productos/editar/'.Crypt::encrypt($item->id))); ?>" class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
            <td><a href="<?php echo e(url('productos/anular/'.Crypt::encrypt($item->id))); ?>" class="btn btn-warning pull-center" onclick="return confirm('Estas seguro de anular el registro?')"><i class="fas fa-times"></i> </a></td>
            <td><a href="<?php echo e(url('productos/eliminar/'.Crypt::encrypt($item->id))); ?>" class="btn btn-danger pull-center" onclick="return confirm('Estas seguro de eliminar el registro?')"><i class="fas fa-trash"></i> </a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </tbody>
</table>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Productos\index.blade.php ENDPATH**/ ?>