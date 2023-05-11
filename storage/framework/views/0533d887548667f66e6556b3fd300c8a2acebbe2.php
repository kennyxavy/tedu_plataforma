

<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tienda</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Productos</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="<?php echo e(url('images/'.$pro->image_path.'')); ?>"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="<?php echo e($pro->image_path); ?>"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title"><?php echo e($pro->name); ?></h6></a>
                                    <p>$<?php echo e($pro->price); ?></p>
                                    <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" value="<?php echo e($pro->id); ?>" id="id" name="id">
                                        <input type="hidden" value="<?php echo e($pro->name); ?>" id="name" name="name">
                                        <input type="hidden" value="<?php echo e($pro->price); ?>" id="price" name="price">
                                        <input type="hidden" value="<?php echo e($pro->image_path); ?>" id="img" name="img">
                                        <input type="hidden" value="<?php echo e($pro->slug); ?>" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> agregar al carrito
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\shop\shop.blade.php ENDPATH**/ ?>