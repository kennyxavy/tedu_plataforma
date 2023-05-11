
<?php $__env->startSection('otrolink'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('cabecera'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/start.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('market')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
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

          <div class="mt-4">
           
           <br> Califique al proveedor           
           <?php
                if(isset($ratingpro[0]->cantidad)){
                  $review = (object)['rate' => $ratingpro[0]->cantidad];
                }else{
                  $review =(object)['rate' => 0];
                }
                
                for ($i = 0; $i < 5; ++$i) {
                    if($review->rate<=$i){
                      echo '<i class="far fa-star" onclick="registrastarpro('.($i+1).','.$datos[0]->user_id.');return false;"></i>';
                    }
                    else {
                      echo '<i class="fas fa-star" onclick="registrastarpro('.($i+1).','.$datos[0]->user_id.');return false;"></i>';  
                    }
                }
            ?>  
            <br>Rating Global:  <?php echo e(round($ratingprogavg[0]->rate,2)); ?>

          </div>   
           
          
          <div class="py-2 px-3 mt-4">
            <h3 class="mb-0">
              Precio: $ <?php echo e($datos[0]->precio); ?>

            </h3>
            <small>Publicado por: <?php echo e($datos[0]->usuario); ?></small><br>
            <small>Categoria: <?php echo e($datos[0]->categoria); ?></small><br>
            <small>Subcategoria: <?php echo e($datos[0]->subcategoria); ?></small>
          </div>

          
          <div class="mt-4">
            <a href="" onclick="registratemporal(<?php echo e($datos[0]->id); ?>);return false;" class="btn btn-outline-primary btn-lg btn-flat"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Agregar al carro</a>         
            <a href="<?php echo e(route('micarrito')); ?>" class="btn btn-outline-warning btn-lg btn-flat"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Comprar</a>         
           <br> Calificar su experiencia
           
           <?php
                if(isset($rating[0]->cantidad)){
                  $review = (object)['rate' => $rating[0]->cantidad];
                }else{
                  $review =(object)['rate' => 0];
                }
                
                for ($i = 0; $i < 5; ++$i) {
                    if($review->rate<=$i){
                      echo '<i class="far fa-star" onclick="registrastar('.($i+1).','.$datos[0]->id.');return false;"></i>';
                    }
                    else {
                      echo '<i class="fas fa-star" onclick="registrastar('.($i+1).','.$datos[0]->id.');return false;"></i>';  
                    }
                }
            ?>  
            <br>Rating General:  <?php echo e(round($ratingavg[0]->rate,2)); ?>

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
      <div class="row mt-4">
        <nav class="w-100">
          <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">
              Comentarios del producto 
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalmodulodetalle"><i class="fa fa-comment" aria-hidden="true"></i>
                Comentar
              </button>
            </a>
          </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <ul>
              <?php $__currentLoopData = $comentario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($item->comentario); ?> (<small><?php echo e($item->created_at); ?> por <?php echo e($item->name); ?>)</small></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <div class="modal fade" id="modalmodulodetalle">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar comentario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="<?php echo e(route('comentario.guardar')); ?>" accept-charset="UTF-8">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" value="<?php echo e($datos[0]->id); ?>" id="productoid" name="productoid">
                    <label for="enombremodulo">Comentario:</label>
                    <textarea name="comentario" id="comentario" class="form-control" rows="10"></textarea>
                </div>  
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>

          </form>
        </div>
        <div class="modal-footer justify-content-between">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>
<script>
  $('#addStar').change('.star', function(e) {
    $(this).submit();
  });
</script>
<script>
  function registrastarpro(cantidad,proveedor){
      
      $.ajax({  
            url: "<?php echo e(route('registrastarpro')); ?>",                      
            dataType: "json",        
            data: {
            cantidad:cantidad,
            proveedor:proveedor
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    Swal.fire(
                    'Proveedor calificado',
                    'Gracias',
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
    function registrastar(cantidad,producto){
      
      $.ajax({  
            url: "<?php echo e(route('registrastar')); ?>",                      
            dataType: "json",        
            data: {
            cantidad:cantidad,
            producto:producto
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    Swal.fire(
                    'Producto calificado',
                    'Gracias',
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
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Market\verproducto.blade.php ENDPATH**/ ?>