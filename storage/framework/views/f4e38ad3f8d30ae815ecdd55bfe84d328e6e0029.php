<?php $__env->startSection('otrolink'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo'); ?>
Mi código de referencia es: <strong><?php echo e(Auth()->user()->micodigo); ?></strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenedor'); ?>


<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" />

<div class="row">
    <div class='col-md-12'>
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo \Session::get('success'); ?></li>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(\Session::has('danger')): ?>
            <div class="alert alert-danger">
                <ul>
                    <li><?php echo \Session::get('danger'); ?></li>
                </ul>
            </div>
        <?php endif; ?>
       
            <?php if(Auth()->user()->plan_id==2 ): ?>
                <div class="card-header bg-info ">
                    <h3 class="card-title">
                        Felicidades, ahora eres miembro PRO - <?php echo e(explode(' ', Auth()->user()->name)[0]); ?>... Ya puedes compartir tu Link de Afiliado!
                    </h3>
			</br>
		     <div class="share" id="share"></div>
                </div>
            <?php else: ?>
                <div class="container justify-content-center" style="position:relative; left:12vw; right:20vw !important; ">
        
                    <button class="btn btn-danger" type="button"  onclick="location.href='/public/comprarplan';"><span style="padding-left:15vw ;padding-right:15vw">Comprar Plan Pro <i class="fa fa-thumbs-up" aria-hidden="true"></i> </span></button>
                </div>
		
            <?php endif; ?>
            

           
    </div>

</div>

<section class="academy" id="academy">

<div class="content">
    <div class="box">
        <div class="imgBx">
        <?php if(Auth()->user()->plan_id==2 || Auth()->user()->categoria_users_id==1 || Auth()->user()->categoria_users_id==2): ?>

        <a href="<?php echo e(route('usuarios.mired')); ?>">
        <?php else: ?>  
            <a href="<?php echo e(route('comprarplan')); ?>">
        <?php endif; ?>
            <img src="<?php echo e(asset('images/Tedu_socio_card.svg')); ?>"  alt="">
        </div>
        </a>
    </div>
    <div class="box">
        <div class="imgBx">
        <?php if(Auth()->user()->plan_id==2 || Auth()->user()->categoria_users_id==1 || Auth()->user()->categoria_users_id==2): ?>

        <a href="<?php echo e(route('market')); ?>">
        <?php else: ?>  
            <a href="<?php echo e(route('comprarplan')); ?>">
        <?php endif; ?>
            <img src="<?php echo e(asset('images/Tedu_market_card.svg')); ?>" alt="">
        </div>
        </a>
    </div>
    <div class="box">
        <div class="imgBx">
        <?php if(Auth()->user()->plan_id==2 || Auth()->user()->categoria_users_id==1 || Auth()->user()->categoria_users_id==2): ?>

        <a href="<?php echo e(route('listacursos')); ?>">
        <?php else: ?>  
            <a href="<?php echo e(route('comprarplan')); ?>">
        <?php endif; ?>
            <img  src="<?php echo e(asset('images/Tedu_academy_card.svg')); ?>"alt="">
        </a>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('main/js/jquery-3.3.1.min.js')); ?>"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
   
    let fullName='<?php echo Auth()->user()->name;?>';
    let codreferido='<?php echo Auth()->user()->micodigo;?>';
    console.log(codreferido);
    const [firstName, , lastName] = fullName.split(" ");
    $("#share").jsSocials({
        title:`Hola!, soy ${firstName} ${lastName}, Únete a mi red de afiliados y obtén los beneficios`,
        text:`Hola!, soy ${firstName} ${lastName}, Únete a mi red de afiliados y obtén los beneficios`,
        showLabel:false,
        url:`https://sistema.teduemprende.com/public/register?referido=${codreferido}`,
        shares: ["email", {share:"twitter", label:"", logo:"fab fa-twitter fa-2x"}, {share:"facebook", label:"", logo:"fab fa-facebook-f", text:`https://api.whatsapp.com/send?text=Hola!, soy ${firstName} ${lastName}!, Únete a mi red de afiliados y obtén los beneficios https://sistema.teduemprende.com/public/register?referido=${codreferido}`}, {share:"whatsapp", label:"", shareUrl:`https://api.whatsapp.com/send?text=Hola!, soy ${firstName} ${lastName}!, Únete a mi red de afiliados y obtén los beneficios https://sistema.teduemprende.com/public/register?referido=${codreferido}`,logo:"fab fa-whatsapp fa-2x"}]
    });
    
    
</script>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-abajo'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes/lte/layaout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\home.blade.php ENDPATH**/ ?>