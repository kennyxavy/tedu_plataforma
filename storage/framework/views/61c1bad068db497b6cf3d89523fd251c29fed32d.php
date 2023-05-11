
<?php $__env->startSection('cabecera'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/card.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/autocompletar.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
    
<a href="<?php echo e(route('listadocursos')); ?>" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
Curso encontrado!!   
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\Mantenimiento\Cursos\cursobuscado.blade.php ENDPATH**/ ?>