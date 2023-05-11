<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Emprendimiento y Negocios">
    <meta name="robots" content="index, follow">


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="icon" href="/images/TEDU-ICO.ico">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/menu_cursos.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0854984c4f.js" crossorigin="anonymous"></script>

    <title>TEDÜ Academy</title>
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
<!-- <body> -->

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70"></body>
<!-- FLOATING WHATSAPP BUTTON -->
<div class="wsp-container">
    <a href="https://api.whatsapp.com/send?phone=+593958991711&text=Hola necesito mas información" class="btn_wsp"
        target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
</div>
<!--========================================================== -->
<!-- ENCABEZADO -->
<!--========================================================== -->

<header>
    <div class="container justify-content-left">
        <a class="navbar-brand fa fa-arrow-left" href="/public/academia">
            <!-- <img onclick="location.href='/public/home';" src="/img/TEDU-ICO.ico" class="img-fluid" alt="Logo"
                width="50px" height="20px"> -->
            <span onclick="location.href='/public/home';"  class="fs-5 text-danger fw-bold">TEDU</span> 
        </a>
    </div>
</header>

<h1 class="title p-1 fs-1" align="center">Cursos <span class="text-danger">Base<span /></h1>
<h1 class="p-3 fs-2 border-top border-3"></h1>

<section class="academy" id="academy">

    <div class="content">
        <div class="box">
            <div class="imgBx">
                <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Curso de Ventas</h4>
                <div class="main-container">
                  
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='https://academia.teduemprende.com/course/view.php?id=24'">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
            <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Curso de Emprendimientoso</h4>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_emprendimiento.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Curso de Marketing</h4>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_marketing.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Curso de E-Commerce</h4>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_ecommerce.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Curso de Finanzas</h4>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_finanzas.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Mindset</h4>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_mindset.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Coaching</h4>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_coaching.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h4>Redes Sociales</h4>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_redes_sociales.html';">Ingresar</button>
                </div>
            </div>
        </div>


    </div>
</section>

<h1 class="title p-1 fs-1" align="center">Cursos de<span class="text-danger">Negocios<span /></h1>
<h1 class="p-3 fs-2 border-top border-3"></h1>

<section class="academy" id="academy">
    <div class="content">

        <div class="box">

            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Referencias</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_referencias.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Inmobiliarios</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_inmoviliarios.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Marketplace</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_marketplace.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Seguros</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_seguros.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Contenidos </h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_contenidos.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Viajes</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_viajes.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Blockchain</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_blockchain.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Trading</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_trading.html';">Ingresar</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx">
                  <img src="{{asset('/images/Beach_Flatline.png')}}" width="400px" height="250px"  alt="image1">
            </div>
            <div class="text">
                <h3>Inteligencia Artificial</h3>
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/HTML/curso_inteligencia_artifial.html';">Ingresar</button>
                </div>
            </div>
        </div>

    </div>
</section>




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
            <li><a href="/index.html"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="/HTML/prices_table.html">Crear Cuenta</a></li>
            <li><a href="/HTML/seguros.html">TEDÜ Seguros</a></li>
            <li><a href="/HTML/market.html">TEDÜ Market</a></li>
        </ul>
        <a href="/HTML/ventana_modal_term_condic.html" class="terminos">Terminos y condiciones TEDÜ</a>
        <p>Copyright &copy; 2022 TEDÜ | All Rights Reserved</p>
    </div>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>
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