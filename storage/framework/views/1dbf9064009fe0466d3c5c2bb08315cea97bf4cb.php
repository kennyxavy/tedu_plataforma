<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
Mi código de referencia es: <strong><?php echo e(Auth()->user()->micodigo); ?></strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-12 col-sm-6">
                <div class="card card-primary card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Depositos/Transferencias</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Tarjeta de crédito/débito</a>
                      </li>
                      
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <ul>
                            <li>
                                Para el pago de la membresía, deposíta o transfiere tu pago por el plan escogido a la cuenta: TEDU S.A.S.,RUC: 0993370883001, Cta. Cte. #2100272072, Banco Pichincha.
                            </li>
                            <li>
                                Scanea o envía en foto, de tu cédula, el comprobante del depósito o transferencia al siguiente email info@teduemprende.com o al WhatsApp 0958991711
                            </li>
			    <li>
                                <b>Una vez enviado el comprobante, en máximo 48 horas obtendrás acceso a TEDU PRO.</b>                        
                            </li>
                        </ul> 
                        
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <img src="<?php echo e(asset('images/tarjetas.png')); ?>" class="img-fluid" alt="Mis tarjetas">
                        Puedes realizar tus pagos mediante tarjeta de crédito/débito de tu Banco preferido, suscribiendote de forma mensual, para que tengas mayores beneficios perteneciendo a la tribu TEDU. Sigue las siguientes instrucciones:
                        <ul>
                            <li>Acceder al boton de Comprar mi membresía.</li>
                            <li>Llena los datos solicitados.</li>
                            <li>Escoger el plan mensual codificado.</li>
                            <li>Proceder con el pago.</li>
                            <li>Una vez realizado el pago, por favor enviamos el comprobante del pago al siguiente email info@teduemprende.com o al WhatsApp 0958991711 y nosotros procederemos inmediatamente a validar la información en el banco.</li>
                            <li>Una vez validado, inmediatamente ya perteneces a la Tribu TEDU.</li>
                        </ul>
                            <br><a href="https://recurring.pagomedios.com/tedu" target="_blank"><button type="button" class="btn btn-info">Comprar mi membresía</button></a>
                      </div>
                     
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\planes\escogerpago.blade.php ENDPATH**/ ?>