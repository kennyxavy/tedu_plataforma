
<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
    Despachar de TEDU MARKET
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
      <th>Fecha</th>
      <th>No. Pedido</th>
      <th>Pedido por</th>
      <th>No. transaccion Wallet</th>
      <th>Fecha transaccion Wallet</th>
      <th>Destino</th>
      <th>Total</th> 
      <th>Estado</th>  
      <th>Ver</th>
      <th>Finalizar</th>
    </tr>
    </thead>
    <tbody>      
      <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->fecha); ?></td>
            <td><?php echo e(str_pad($item->id, 5, "0", STR_PAD_LEFT)); ?></td>
            <td><?php echo e($item->usuario); ?></td>
            <td><?php echo e(str_pad($item->monederoid, 5, "0", STR_PAD_LEFT)); ?></td>
            <td><?php echo e($item->monederofecha); ?></td>
            <td><?php echo e($item->lugarenvio); ?></td>
            <td><?php echo e($item->total); ?></td>
            <?php if($item->despachado==1): ?>
            <td><span class='badge badge-success'>Despachado</span></td>
            <?php else: ?>
            <td><span class='badge badge-warning'>Pendiente</span></td>
            <?php endif; ?>
            <td><a href="" class="btn btn-warning pull-center" onclick="callmodal(<?php echo e($item->id); ?>)" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i> </a></td>
            <td><a href="<?php echo e(url('despachar/'.Crypt::encrypt($item->id))); ?>" class="btn btn-info pull-center"><i class="fas fa-user-edit"></i> </a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </tbody>
</table>

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detalle del pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
                <tr>
                  <th>Cantidad</th>
                  <th>Producto</th>
                  <th>Publicado por</th>
                  <th>Precio</th>
                  <th>Iva</th>
                  <th>Subtotal</th>
                </tr>
                <tbody id="detallecomentario">

                </tbody>                                           
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>
<script>
  function callmodal(numero) {
      
      $("#detallecomentario").children().remove();
      var d="";
      $.ajax({  
          url: "<?php echo e(route('buscarpedido')); ?>",                      
          dataType: "json",        
          data: {
            id:numero
          }, 
          success: function(data)             
          {
             console.log(data);
             for (let i = 0; i < data.length; i++) {
                 
                 d+= '<tr>'+
                  '<td>'+data[i].cantidad+'</td>'+
                  '<td>'+data[i].producto+'</td>'+   
                  '<td>'+data[i].publicadopor+'</td>'+                     
                  '<td>'+data[i].precio+'</td>'+
                  '<td>'+data[i].iva+'</td>'+
                  '<td>'+data[i].total+'</td>'+
                  '</tr>';
                 
             }                 
                  
              $("#detallecomentario").append(d);
          }
      });      
     
      $('#exampleModalScrollable').modal();
  }

 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Market\misdespachos.blade.php ENDPATH**/ ?>