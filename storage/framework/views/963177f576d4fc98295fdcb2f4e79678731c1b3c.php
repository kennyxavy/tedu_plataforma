

<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Tienda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        <?php if(session()->has('success_msg')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session()->get('success_msg')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if(session()->has('alert_msg')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo e(session()->get('alert_msg')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if(count($errors) > 0): ?>
            <?php $__currentLoopData = $errors0>all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e($error); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                <?php if(\Cart::getTotalQuantity()>0): ?>
                    <h4><?php echo e(\Cart::getTotalQuantity()); ?> Producto(s) en el carrito</h4><br>
                <?php else: ?>
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="<?php echo e(route('shop')); ?>" class="btn btn-dark">Continue en la tienda</a>
                <?php endif; ?>
                
                <?php $__currentLoopData = $cartCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?php echo e(url('images/'.$item->attributes->image.'')); ?>" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/shop/<?php echo e($item->attributes->slug); ?>"><?php echo e($item->name); ?></a></b><br>
                                <b>Price: </b>$<?php echo e($item->price); ?><br>
                                <b>Sub Total: </b>$<?php echo e(\Cart::get($item->id)->getPriceSum()); ?><br>
                                
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="<?php echo e(route('cart.update')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group row">
                                        <input type="hidden" value="<?php echo e($item->id); ?>" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm" value="<?php echo e($item->quantity); ?>"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                        <button class="btn btn-warning btn-sm" style="width: 40px;margin-right: 25px;"><i class="fa fa-edit"></i></button>
                                    </div>
                                </form>
                                <form action="<?php echo e(route('cart.remove')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" value="<?php echo e($item->id); ?>" id="id" name="id">
                                    <button class="btn btn-danger btn-sm" style="margin-right: 5px;">Eliminar item <i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($cartCollection)>0): ?>
                    <form action="<?php echo e(route('cart.clear')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button class="btn btn-secondary btn-md">Borrar Carrito</button> 
                    </form>
                <?php endif; ?>
            </div>
            <?php if(count($cartCollection)>0): ?>
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>$<?php echo e(\Cart::getTotal()); ?></li>
                        </ul>
                    </div>
                    <br><a href="<?php echo e(route('shop')); ?>" class="btn btn-dark">Continue en la tienda</a>
                    <a href="/checkout" class="btn btn-success">Proceder al Checkout</a>
                </div>
            <?php endif; ?>
        </div>
        <br><br>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\shop\cart.blade.php ENDPATH**/ ?>