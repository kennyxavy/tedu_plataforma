<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('cabecera'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
    <strong>Pago de comisiones a socios inscritos a Plan PRO</strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo e(route('pagossocios.pagar')); ?>" class="btn btn-success float-left" onclick="ejecuta(event)"><i
                    class="fas fa-plus-circle"></i> Pagar</a>
        </div>
    </div>
    <br>

    <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>
                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#"
                        class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> <!-- end .flash-message -->

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>DNI</th>
                <th>MiCodigo</th>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>A pagar</th>
                <th>Saldo Final</th>
                <th>Último pago el</th>
                <th>Plan</th>
                <th>Detalle</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $saldofinal = 0;
            ?>
            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($item->dni); ?></td>
                    <td><?php echo e($item->codmentor); ?></td>
                    <td><?php echo e($item->nombre); ?></td>
                    <td><?php echo e($item->misaldo); ?></td>
                    <td><?php echo e($item->retornapago); ?></td>
                    <td><?php echo e($item->saldofinal); ?></td>
                    <td><?php echo e($item->ultimopago); ?></td>
                    <td><?php echo e($item->plan); ?></td>
                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                            onclick="callmodal('<?php echo e($item->id); ?>','<?php echo e($item->nombre); ?>')"
                            class="btn btn-warning pull-center"><i class="fas fa-user-edit"></i> </a></td>
                </tr>
                <?php
                    $saldofinal = $saldofinal + $item->retornapago;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-12">
            <h3><strong>Total a pagar a socios: $ <?php echo e(round($saldofinal, 2)); ?> por cartera virtual.</strong>
            </h3>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div id="nombremedico"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Nivel</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Comisión ganada</th>
                            </tr>
                        </thead>
                        <tbody id="detallehonorarios">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script-abajo'); ?>
    <script>
        function ejecuta(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute(
                'href'
            ); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            //console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                title: 'Atención!!',
                icon: 'question',
                text: '¿Estás seguro de proceder al pago a las billeteras virtuales de los socios presentados en la tabla?. Se recuerda que este proceso no tiene retorno de anulación por lo que inmediatamente se reflejará en la cartera virtual de los usuarios.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    //Swal.fire('Abonado a las carteras virtuales de los socios', '', 'success')
                    window.location.href = urlToRedirect
                } else if (result.isDenied) {
                    Swal.fire('No se ha generado ningun cambio', '', 'info')
                }
            })
        }
    </script>
    <script>
        function callmodal(ingreso, nommedico) {
            $("#detallehonorarios").children().remove();
            document.getElementById("nombremedico").innerHTML = "Comisiones ganadas de - <strong>" + nommedico +
                "</strong>";
            var d = "";
            var total = 0;
            $.ajax({
                url: "<?php echo e(route('pagossocios.buscar')); ?>",
                dataType: "json",
                data: {
                    ningreso: ingreso
                },
                success: function(data) {
                    console.log(data);

                    for (let i = 0; i < data.lista.length; i++) {

                        d += '<tr>' +
                            '<td>' + data.lista[i].nivel + '</td>' +
                            '<td>' + data.lista[i].dni + '</td>' +
                            '<td>' + data.lista[i].name + '</td>' +
                            '<td>' + parseFloat(data.lista[i].comision).toFixed(2) + '</td>' +
                            '</tr>'
                        total = total + parseFloat(Math.round(data.lista[i].comision, 2));
                        //console.log(d);

                    }
                    d += '<tr>' +
                        '<td></td>' +
                        '<td></td>' +
                        '<td><strong>TOTAL DE PAGO</strong></td>' +
                        '<td><strong>' + total + '</strong></td>' +
                        '</tr>';

                    $("#detallehonorarios").append(d);
                }
            });

            $('#myModal').modal();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\PagoSocio\index.blade.php ENDPATH**/ ?>