<?php $__env->startSection('cabecera'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/card.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/autocompletar.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    
    <div class="input-group mb-12">
        <input type="text" class="form-control" id="txtbusca" placeholder="Buscar un curso" aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div> <small>* Solo aplica segun su plan contratado</small>
        <div id="suggestions"></div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>
<div class="container">
    
	<div class="row">
        <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <h5 class="text-center"><strong><?php echo e($item->plan); ?></strong></h5>
                <hr>
                <div class="profile-card-2"><img src="<?php echo e(asset('image_cursos/'.$item->archivo)); ?>" class="img img-responsive">
                    <?php if($item->fecha_desde<date("Y-m-d")): ?>
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-info">
                            DISPONIBLE
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-danger">
                            PROXIMAMENTE <br><small><?php echo e($item->fecha_desde); ?></small>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="profile-name"><a href="<?php echo e(url('modulos/consulta/'.Crypt::encrypt($item->id))); ?>"><?php echo e($item->nombre); ?></a></div>
                    <div class="profile-username"><?php echo e($item->categoria); ?></div><br>
                    <div class="profile-icons"><?php echo e($item->tutor); ?></div> 
                </div>
    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
        <!--
        <div class="col-md-4">
            <h4 class="text-center"><strong>STYLE 2</strong></h4>
            <hr>
            <div class="profile-card-6"><img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-6.jpg" class="img img-responsive">
                <div class="profile-name">JOHN
                <br>DOE</div>
                <div class="profile-position">Lorem Ipsum Donor</div>
                <div class="profile-overview">
                    <div class="profile-overview">
                    <div class="row text-center">
                        <div class="col-xs-4">
                            <h3>1</h3>
                            <p>Rank</p>
                        </div>
                        <div class="col-xs-4">
                            <h3>50</h3>
                            <p>Matches</p>
                        </div>
                        <div class="col-xs-4">
                            <h3>35</h3>
                            <p>Goals</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-4">
            <h4 class="text-center"><strong>STYLE 3</strong></h4>
            <hr>
            <div class="profile-card-4 text-center"><img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-4.jpg" class="img img-responsive">
                <div class="profile-content">
                <div class="profile-name">John Doe
                    <p>@johndoedesigner</p>
                </div>
                <div class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</div>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="profile-overview">
                                <p>TWEETS</p>
                                <h4>1300</h4></div>
                        </div>
                        <div class="col-xs-4">
                            <div class="profile-overview">
                                <p>FOLLOWERS</p>
                                <h4>250</h4></div>
                        </div>
                        <div class="col-xs-4">
                            <div class="profile-overview">
                                <p>FOLLOWING</p>
                                <h4>168</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    -->
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>
<script type="text/javascript">
    $(document).ready(function () {
       (function($) {
           $('#FiltrarContenido').keyup(function () {
                var ValorBusqueda = new RegExp($(this).val(), 'i');
                $('.BusquedaRapida tr').hide();
                 $('.BusquedaRapida tr').filter(function () {
                    return ValorBusqueda.test($(this).text());
                  }).show();
                    })
          }(jQuery));
    });
</script>
<script>
    function getRealPath(){
        var localObj = window.location;
        var contextPath = localObj.pathname.split("/")[1];
        var basePath = localObj.protocol + "//" + localObj.host + "/"+ contextPath;
        return basePath ;
    }

</script>

<script>
    $("body").click(function() {
        $('#suggestions').fadeOut(500);
    });
    $(document).ready(function(){
         $("#txtbusca").keyup(function(){
              var parametros=$(this).val()
             
              $.ajax({
                     data: {
                        dato:parametros
                     },
                    url:   "<?php echo e(route('modulos.buscarcursos')); ?>",
                    dataType: "json",
                    beforeSend: function () { },
                    success:  function (response) {    
                        console.log(getRealPath());  
                        //document.getElementById("salida").value=response[0].nombre
                        datos='';
                        response.forEach(element => {
                            ruta=getRealPath();
                            ruta1=ruta+"/modulos/cursosencontrado/"+element.id
                            datos=datos+'<div><a class="suggest-element" href="'+ruta1+'" data="'+element.nombre+'" id="'+element.id+'">'+element.nombre+'</a></div>';
                        });
                        $("#suggestions").fadeIn(1000).html(datos);
                        $('.suggest-element').on('click', function(){
                            //Obtenemos la id unica de la sugerencia pulsada
                            var id = $(this).attr('id');
                            //Editamos el valor del input con data de la sugerencia pulsada
                            $('#key').val($('#'+id).attr('data'));
                            //Hacemos desaparecer el resto de sugerencias
                            $('#suggestions').fadeOut(1000);
                            //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                            //return false;
                        }); 
                  },
                  error:function(){
                       //alert("error")
                    }
               });
         })
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Cursos\curso.blade.php ENDPATH**/ ?>