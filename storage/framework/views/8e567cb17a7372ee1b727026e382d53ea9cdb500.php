<?php $__env->startSection('cabecera'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/shop.css')); ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('otrolink'); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
 Estimado comprador, en esta sección podrá observar los items seleccionados antes de comprar los productos.<br>
 Su saldo actual es de <strong>$ <?php echo e($misaldo[0]->saldo); ?></strong> 
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
    <h3 class="h3"><strong><i class="fa fa-shopping-bag"></i> CARRITO DE COMPRA - TEDU</strong></h3>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col"></th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descuento</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $total=0;
                        $iva=0;
                        $totalacumulado=0;
                    ?>
                    <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $total=$total+$item->subtotal;
                            $iva=$iva+($item->subtotal*0.12);
                            
                        ?>
                        <tr>
                            <td><img width="50" height="50"  class="img-fluid" src="<?php echo e(url('image_productos/'.$item->rutaimagen)); ?>" alt=""></td>
                            <td><?php echo e($item->nombre); ?></td>
                            <td><?php echo e($item->cantidad); ?></td>
                            <td>
                                <a href="" onclick="registratemporal(<?php echo e($item->id); ?>,'mas');return false;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                <a href="" onclick="registratemporal(<?php echo e($item->id); ?>,'menos');return false;"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                            </td>
                            <td><?php echo e($item->precio); ?></td>
                            <td><?php echo e($item->descuento); ?></td>
                            <td><?php echo e(round($item->subtotal,2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
                
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>* Los items aplican los impuestos correspondiente.</td>
                        <td></td>
                        <td></td>
                        <th>Subtotal</th>
                        <th><?php echo e(round($total,2)); ?></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>IVA 12%</th>
                        <th><?php echo e(round($iva,2)); ?></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Envio</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="envio" name="envio" onchange="registratemporal2(this);">
                                        <option value="0" selected></option>
                                        <?php $__currentLoopData = $destinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($item->id); ?>><?php echo e($item->destino); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!--
                                        <?php if($envio): ?>
                                            <?php if($envio[0]->ciudad=="Guayaquil"): ?>
                                                <option value="0">Sin envio</option>
                                                <option value="1" selected>Guayaquil</option>
                                                <option value="2">Otras provincias</option>
                                            <?php endif; ?>
                                            <?php if($envio[0]->ciudad=="Otros"): ?>
                                                <option value="0">Sin envio</option>
                                                <option value="1">Guayaquil</option>
                                                <option value="2" selected>Otras provincias</option>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <option value="0" selected>Sin envio</option>
                                            <option value="1">Guayaquil</option>
                                            <option value="2">Otras provincias</option>
                                        <?php endif; ?>
                                        -->                                                                         
                                    </select>
                                </div>
                            </div>                           
                        </td>
                        <td></td>
                        <td></td>
                        <?php if($envio): ?>
                            <th>Costo de envío a <?php echo e($envio[0]->ciudad); ?></th>
                        <?php else: ?>
                            <th>Costo de envío a ...</th>
                        <?php endif; ?>
                        
                        <?php if($envio): ?>
                            <th><?php echo e(round($envio[0]->costo,2)); ?></th>
                        <?php else: ?>   
                            <th><?php echo e(0.00); ?></th>
                        <?php endif; ?>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Mentor</label>
                                <div class="col-sm-4">
                                    <?php if($mentor): ?>
                                        <input type="text" class="form-control" id="mentor" name="mentor" value="<?php echo e($mentor[0]->mentor); ?>" onblur="registratemporal3(this);return false;"">
                                    <?php else: ?>
                                        <input type="text" class="form-control" id="mentor" name="mentor" value="" onblur="registratemporal3(this);return false;"">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <th>Fee administrativo</th>
                        <th><?php echo e(round($total,2)*($configuracion[0]->porcentajeganancia/100)); ?></th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <th>Total</th>
                      <?php if($envio): ?>
                        <th><?php echo e(round($total+$iva+$envio[0]->costo+(round($total,2)*($configuracion[0]->porcentajeganancia/100)),2)); ?></th>
                      <?php else: ?>
                        <th><?php echo e(round($total+$iva+0+(round($total,2)*($configuracion[0]->porcentajeganancia/100)),2)); ?></th>
                      <?php endif; ?>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        <th><a href="<?php echo e(route('pagarcompra')); ?>" class="btn btn-primary pull-right"><i class="fa fa-usd" aria-hidden="true"></i> Pagar con Wallet</a></th>
                    </tr>
                </tfoot>
          </table>          
          
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>
<script>

    function registratemporal(idproducto,orden){
        //console.log(idproducto)
        //document.getElementById("formventa").reset();  
        $.ajax({  
            url: "<?php echo e(route('actualizarcarro')); ?>",                      
            dataType: "json",        
            data: {
            unico:idproducto,
            orden:orden
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
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

    function registratemporal2(sel)
    {
        //alert(sel.value);
        $.ajax({  
            url: "<?php echo e(route('actualizarcarro2')); ?>",                      
            dataType: "json",        
            data: {
            unico:sel.value
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
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

    function registratemporal3(sel)
    {
        //alert(sel.value);
        $.ajax({  
            url: "<?php echo e(route('actualizarcarro3')); ?>",                      
            dataType: "json",        
            data: {
            unico:sel.value
            }, 
            success: function(datos)             
            {
                console.log(datos);
                if (datos.sucess==true ) {
                    //location.reload()
                }else{
                    Swal.fire(
                    'Problemas al registrar su mentor de referencia',
                    'Por favor verifique si el codigo es correcto o solicitelo nuevamente.',
                    'error'
                    )
                }
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Market\carrito.blade.php ENDPATH**/ ?>