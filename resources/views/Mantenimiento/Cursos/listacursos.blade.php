<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Emprendimiento y Negocios">
    <meta name="robots" content="index, follow">


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="icon" href="{{ asset('/images/TEDU-ICO.ico') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/menu_cursos.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0854984c4f.js" crossorigin="anonymous"></script>

    <title>TEDÜ Academy</title>
    <style>
        .first__paragraph,
        .terms__conditions,
        .final__paragraph {
            margin: 20px 50px;
            text-align: left;
        }

        .video-bienvenida video {
            width: 100%;
            height: 100%;
            margin: auto;
            padding: 0px;
            max-width: 720px;
            /* box-shadow: -1px 6px 14px 0px rgba(0,0,0,0.75); */
        }
    </style>
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
        <a class="navbar-brand" href="/public/home">
            <!-- <img onclick="location.href='/public/home';" src="/img/TEDU-ICO.ico" class="img-fluid" alt="Logo"
                width="50px" height="20px"> -->
            <span onclick="location.href='/public/home';" class="fs-1 text-danger fw-bold">TEDÜ</span>
        </a>
    </div>
</header>

<section class="video-caja" id="video-caja">
    <div class="col50">
        <h2 class="titleText" align="center"><span>¡</span><span>T</span>EDÜ te da la
            <span>B</span>ienvenida<span>!</span>
        </h2>
    </div>
    <br>
    <div class="video-bienvenida"align="center">
        <video controls autoplay loop>
            <source src="https://www.mediafire.com/file_premium/06qidam0hkth6ju/Bienvenidos_a_TEDU_Academy.mp4/file"
                type="video/mp4">
        </video>
    </div>
</section>
<br>
<br>
<br>
<h1 class="p-3 fs-2 border-top border-3"></h1>
<h1 class="title p-1 pb-4 fs-1" align="center" style="display: block; ">Cursos <span class="text-danger">Base</span>
</h1>

<div class="first__paragraph pl-4 pr-4">
    <p class="text-left">"Cursos que conforman la BASE de conocimientos indispensables para realizar negocios digitales.
        Se recomienda completarlos para garantizar el resultado deseado en el negocio que decida emprender. Al completar
        tareas recibirán la retroalimentación de un experto del tema para enriquecer su desarrollo personal."</p>
</div>



<section class="academy" id="academy">

    <div class="content">
        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoventas';">
                <img src="{{ asset('/images/VENTAS-TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">

                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoventas';">Ingresar</button>

                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$200</strong></em></h1>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoecommerce';">
                <img src="{{ asset('/images/E-Commerce_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoecommerce';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$180</strong></em></h1>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoemprendimiento';">
                <img src="{{ asset('/images/EMPRENDIMIENTO_TEDU.jpg') }}" width="400px" height="250px"
                    alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoemprendimiento';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$90</strong></em></h1>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursomarketing';">
                <img src="{{ asset('/images/MARKETING_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursomarketing';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$300</strong></em></h1>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursomindset';">
                <img src="{{ asset('/images/MINDSET_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursomindset';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$80</strong></em></h1>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursofinanzas';">
                <img src="{{ asset('/images/Finanzas_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursofinanzas';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$150</strong></em></h1>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursocoaching';">
                <img src="{{ asset('/images/COACHING_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursocoaching';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$90</strong></em></h1>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoredesociales';">
                <img src="{{ asset('/images/Redes Sociales_TEDU.jpg') }}" width="400px" height="250px"
                    alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoredesociales';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$100</strong></em></h1>
                </div>
            </div>
        </div>


    </div>
</section>

<h1 class="title p-1 pb-4 fs-1" style="display: block; " align="center">Cursos <span
        class="text-danger">Negocios</span></h1>



<div class="first__paragraph">
    <p class="text-left">"Bienvenidos a disfrutar de todas las opciones de negocios que los miembros de TEDÜ pueden
        implementar. El modelo de estudio incluye lanzamientos permanentes con el conocimiento más nuevo e innovador
        disponible que permitirá tener el impacto que un negocio exitoso requiere."</p>
</div>

<h1 class="p-3 fs-2 border-top border-3"></h1>

<section class="academy" id="academy">
    <div class="content">
        {{--
        <div class="box">

            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoventas';">
                <img src="{{ asset('/images/REFERIDOS_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoreferencias';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$100</strong></em></h1>
                </div>
            </div>
        </div> --}}

        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoinmobiliarios';">
                <img src="{{ asset('/images/AIRBNB_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoinmobiliarios';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$500</strong></em></h1>
                </div>
            </div>
        </div>
        {{-- <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoventas';">
                <img src="{{ asset('/images/MARKETPLACE_TEDU.jpg') }}" width="400px" height="250px"
                    alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursomarketplace';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$130</strong></em></h1>
                </div>
            </div>
        </div> --}}
        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoseguros';">
                <img src="{{ asset('/images/SEGUROS_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoseguros';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$190</strong></em></h1>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoia';">
                <img src="{{ asset('/images/VENTAS_CON_IA_TEDU.jpg') }}" width="400px" height="250px"
                    alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoia';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$250</strong></em></h1>
                </div>
            </div>
        </div>
        {{-- <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursocontenidos';">
                <img src="{{ asset('/images/CONTENIDOS_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursocontenidos';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$100</strong></em></h1>
                </div>
            </div>
        </div> --}}

        {{-- <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoviajes';">
                <img src="{{ asset('/images/VIAJES_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoviajes';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$90</strong></em></h1>
                </div>
            </div>
        </div>
        cursoblockchain --}}
        {{-- <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursotrading';">
                <img src="{{ asset('/images/TRADING_TEDU.jpg') }}" width="400px" height="250px" alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursotrading';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$100</strong></em></h1>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBx" onclick="location.href='/public/listadocursos/cursoia';">
                <img src="{{ asset('/images/INTELIGENCIA ARTIFICIAL_TEDU.jpg') }}" width="400px" height="250px"
                    alt="image1">
            </div>
            <div class="text">
                <div class="main-container">
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='/public/listadocursos/cursoia';">Ingresar</button>
                </div>
                <br>
                <div class="card-footer text-center-muted">
                    <h1 class="display-6"><em><strong>Precio:$180</strong></em></h1>
                </div>
            </div>
        </div> --}}

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
            <li><a href="https://sistema.teduemprende.com/public/register">Crear Cuenta</a></li>
            <li><a href="/HTML/seguros.html">TEDÜ Seguros</a></li>
            <li><a href="/HTML/market.html">TEDÜ Market</a></li>
        </ul>
        <a href="/HTML/ventana_modal_term_condic.html" class="terminos">Terminos y condiciones TEDÜ</a>
        <p>Copyright &copy; 2022 TEDÜ | All Rights Reserved</p>
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
