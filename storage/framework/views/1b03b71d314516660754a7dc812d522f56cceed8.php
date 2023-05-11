
<?php $__env->startSection('cabecera'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/shop.css')); ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/autocompletar.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('otrolink'); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('market')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>

<div class="flash-message"> 
  <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
   <?php if(Session::has('alert-' . $msg)): ?> 

   <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> 
   <?php endif; ?> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div> <!-- end .flash-message -->


<div class="container">
    <h3 class="h3"><strong>MARKET GLOBAL - TEDU EMPRENDE</strong></h3>
    <div class="row">
        <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2">
                        <a href="<?php echo e(url('market/ver/'.Crypt::encrypt($item->id))); ?>">
                            <img class="img-thumbnail" src="<?php echo e(url('image_productos/'.$item->rutaimagen)); ?>">
                        </a>
                        <ul class="social">
                            <li><a href="<?php echo e(url('market/ver/'.Crypt::encrypt($item->id))); ?>" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                            <li><a data-tip="Add to Cart" id="agregarcarro"  onclick="registratemporal(<?php echo e($item->id); ?>);return false;"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <a class="add-to-cart" href="" onclick="registratemporal(<?php echo e($item->id); ?>);return false;">Agregar al carro</a>
                    </div>
                    <div class="product-content">
                        <h4 class="title"><a href="#"><?php echo e($item->nombre); ?></a></h4>
                        <span class="publicado">Publicado por: <?php echo e($item->publicadopor); ?></span><br>
                        <span class="price">$ <?php echo e($item->precio); ?></span>
                    </div>
                </div>
            </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>
<script>

    function registratemporal(idproducto){
        //console.log(idproducto)
        //document.getElementById("formventa").reset();  
        $.ajax({  
            url: "<?php echo e(route('registracarro')); ?>",                      
            dataType: "json",        
            data: {
            unico:idproducto
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    Swal.fire(
                    'Producto agregado a su carrito',
                    'Continuar comprando..',
                    'success'
                    )          
                    location.reload()
                }else{
                    Swal.fire(
                    'Problemas al registrar su selección',
                    'Intentar luego..',
                    'error'
                    )
                }
            }
        });
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Market\productoencontrado.blade.php ENDPATH**/ ?>