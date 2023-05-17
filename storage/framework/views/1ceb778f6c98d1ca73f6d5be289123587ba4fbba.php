<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Emprendimiento y Negocios">
    <meta name="robots" content="index, follow">


    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('/images/TEDU-ICO.ico')); ?>">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/registroCabecera.css')); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0854984c4f.js" crossorigin="anonymous"></script>


    


    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Registro Tedü</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    
    


</head>
<!-- TOP NAV -->
<div class="top-nav" id="home">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                <p> <i class='bx bxs-envelope'></i> info@teduemprende.com</p>
                <p> <i class='bx bxs-phone-call'></i> (+593) 095 899 1711</p>
            </div>
            <div class="col-auto social-icons">
                <a href="https://www.facebook.com/teduemprende"><i class='bx bxl-facebook'></i></a>
                <a href="https://twitter.com/teduemprende?s=11&t=N7YCkF_mR_ENq6fE_S2-Yg"><i
                        class='bx bxl-twitter'></i></a>
                <a href="https://instagram.com/teduemprende?igshid=YmMyMTA2M2Y="><i class='bx bxl-instagram'></i></a>
                <a href="https://www.youtube.com/channel/UCvspja0TWwaihtZPA1lxRRg"><i class='bx bxl-youtube'></i></a>
                <a href="https://www.tiktok.com/@teduemprende?_t=8Z5PbloHxAs&_r=1"><i class='bx bxl-tiktok'></i></a>
            </div>
        </div>
    </div>
</div>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70"></body>
<!-- FLOATING WHATSAPP BUTTON -->
<div class="wsp-container">
    <a href="https://api.whatsapp.com/send?phone=+593958991711&text=Hola necesito mas información" class="btn_wsp"
        target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
</div>
<!--========================================================== -->
<!-- ENCABEZADO -->
<!--========================================================== -->



<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <div class="container justify-content-left">
                <a class="navbar-brand" href="<?php echo e(url('login')); ?>">

                    <span class="fs-1 text-danger fw-bold">TEDÜ</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>">Ingresar</a>
                            </li>
                        <?php endif; ?>
                        <div>
                            <p>|</p>
                        </div>
                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>">Registrarse</a>

                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            

                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <p><?php echo e(Auth::user()->name); ?></p> <?php echo e(__('Logout')); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                                
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>





<!--========================================================== -->
<!-- SECCION FRANJA ROJA-->
<!--========================================================== -->
<div id="bg-contactos">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#f11717" fill-opacity="1"
            d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
        </path>
    </svg>
</div>

<!--========================================================== -->
<!--FOOTER-->
<!--========================================================== -->

<footer class="footer_animation">
    <div class="footer_div">
        <h2 class="codig__subtitle p-1 fs-1">SIGUENOS</h2>
        <ul class="social_icon">
            <li><a href="https://www.facebook.com/teduemprende" target="_blank"><i
                        class="fa-brands fa-facebook"></i></a>
            </li>
            <li><a href="https://instagram.com/teduemprende?igshid=YmMyMTA2M2Y=" target="_blank"><i
                        class="fa-brands fa-instagram"></i></a></li>
            <li><a href="https://vm.tiktok.com/ZMLbk563e/" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            </li>
            <li><a href="https://twitter.com/teduemprende?s=11&t=N7YCkF_mR_ENq6fE_S2-Yg" target="_blank"><i
                        class="fa-brands fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCvspja0TWwaihtZPA1lxRRg" target="_blank"><i
                        class="fa-brands fa-youtube"></i></a></li>
        </ul>
        <ul class="menu">
            <li><a href="#banner"><i class="fa-solid fa-arrow-up"></i></a></li>
            <li><a href="https://www.teduemprende.com/"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="https://sistema.teduemprende.com/public/register">Crear Cuenta</a></li>
            
            
        </ul>
        <a href="https://teduemprende.com/HTML/ventana_modal_term_condic.html" class="terminos">Terminos y condiciones
            TEDÜ</a>
        <p>Copyright &copy; 2023 TEDÜ | All Rights Reserved</p>
    </div>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="/js/alert.js"></script>

<script src="/JS/script.js"></script>
<script src="/js/Cursos.js"></script>
<script src="/js/simplyCountdown.min.js"></script>
<script src="/js/countdown_seguros.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\teduprincipal - proyecto_pruebas\resources\views\layouts\app.blade.php ENDPATH**/ ?>