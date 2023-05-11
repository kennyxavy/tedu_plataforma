
<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('productos.aprobar')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Información del producto
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="flash-message"> 
  <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
   <?php if(Session::has('alert-' . $msg)): ?> 

   <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   <?php endif; ?> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div> <!-- end .flash-message -->

<div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none"><?php echo e($datos[0]->nombre); ?></h3>
          <div class="col-12">
            <img class="product-image" src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen)); ?>"  alt="Product Image">
          </div>
          <div class="col-12 product-image-thumbs">
            <div class="product-image-thumb active"><img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen)); ?>" alt="Product Image"></div>
            <?php if($datos[0]->rutaimagen2): ?>
              <div class="product-image-thumb" ><img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen2)); ?>" alt="Product Image"></div>
            <?php endif; ?>
            <?php if($datos[0]->rutaimagen3): ?>
              <div class="product-image-thumb" ><img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen3)); ?>" alt="Product Image"></div>
            <?php endif; ?>
            <?php if($datos[0]->rutaimagen4): ?>
              <div class="product-image-thumb" ><img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen4)); ?>" alt="Product Image"></div>
            <?php endif; ?>
            <?php if($datos[0]->rutaimagen5): ?>
              <div class="product-image-thumb" ><img src="<?php echo e(url('image_productos/'.$datos[0]->rutaimagen5)); ?>" alt="Product Image"></div>
            <?php endif; ?>           
          </div>
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3"><?php echo e($datos[0]->nombre); ?></h3>
          <p><?php echo e($datos[0]->detalle); ?></p>

          <hr>
          
          
          <div class="py-2 px-3 mt-4">
            <h3 class="mb-0">
              Precio: $ <?php echo e($datos[0]->precio); ?>

            </h3>
            <small>Publicado por: <?php echo e($datos[0]->usuario); ?></small><br>
            <small>Categoria: <?php echo e($datos[0]->categoria); ?></small><br>
            <small>Subcategoria: <?php echo e($datos[0]->subcategoria); ?></small>
          </div>

          
          <div class="mt-4">
            <?php if($datos[0]->autorizado==0): ?>
              <a href="<?php echo e(url('productos/autorizar/'.Crypt::encrypt($datos[0]->id))); ?>" class="btn btn-outline-primary btn-lg btn-flat"><i class="fa fa-check" aria-hidden="true"></i>  Autorizar su publicación</a>         
            <?php endif; ?>
          </div>          

        </div>
      </div>
      <div class="row mt-4">
        <nav class="w-100">
          <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Detalle técnico</a>
          </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo e($datos[0]->detalle); ?></div>
          <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><textarea class="form-control" name="detalle2" id="detalle2" rows="10" cols="130"><?php echo e($datos[0]->detalletecnico); ?></textarea> </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Productos\ver.blade.php ENDPATH**/ ?>