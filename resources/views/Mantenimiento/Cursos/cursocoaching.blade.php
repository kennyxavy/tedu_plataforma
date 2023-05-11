<!doctype html>
<html lang="en">

<head>

   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Emprendimiento y Negocios">
   <meta name="robots" content="index, follow">


    <link rel="icon" href="/images/TEDU-ICO.ico">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/curso_ventas.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0854984c4f.js" crossorigin="anonymous"></script>
  <link rel="icon" href="{{asset('/images/TEDU-ICO.ico')}}">

   <title>Curso Coaching TEDÜ</title>
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
                <a href="https://twitter.com/teduemprende?s=11&t=N7YCkF_mR_ENq6fE_S2-Yg"><i class='bx bxl-twitter'></i></a>
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
@php
  
   if(Auth()->user()->plan_id==2  ){
    $url="";
   }else{
   $url="https://sistema.teduemprende.com/public/comprarplan";

   }
@endphp

<div class="container justify-content-left">
        <div class="container justify-content-left">
        <a class="navbar-brand" href="/public/listacursos">
            <!-- <img onclick="location.href='/public/home';" src="/img/TEDU-ICO.ico" class="img-fluid" alt="Logo"
                width="50px" height="20px"> -->
            <span onclick="location.href='/public/listacursos';"  class="fs-1 text-danger fw-bold">TEDÜ</span> 
        </a>
    </div>
</header>

<h1 class="title p-1 fs-1" align="center">Indice de Módulos del Curso de Coaching <span class="text-danger">TEDÜ<span /></h1>
  <h1 class="p-3 fs-2 border-top border-3"></h1>

  <div class="container" id="si">
    <div class="list-group list-group-flush">
      <h1 class="text-xl-start"><span class="text-danger">Índice<span /></h1>
      <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-2" }}" class="list-group-item list-group-item-action list-group-item-info">Módulo 1: Naturaleza y esencia del Coaching</a>
      <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-3" }}"
        class="list-group-item list-group-item-action list-group-item-info">Módulo 2: Naturaleza humana y desarrollo personal</a>
      <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-4" }}" class="list-group-item list-group-item-action list-group-item-info">Módulo 3: Aplicación al coaching y mejora personal del ser humano.</a>
      <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-5" }}"
        class="list-group-item list-group-item-action list-group-item-info">Módulo 4: Coaching y desarrollo social</a>
        <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-6" }}"
        class="list-group-item list-group-item-action list-group-item-info">Módulo 5: Coaching y desarrollo académico</a>
        <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-7" }}"
        class="list-group-item list-group-item-action list-group-item-info">Módulo 6: Coaching y preparación a la vida laboral</a>
        <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-8" }}"
        class="list-group-item list-group-item-action list-group-item-info">Módulo 7: Coaching y desarrollo profesional. </a>
        <a href="{{ $url ? $url: "https://academia.teduemprende.com/course/view.php?id=22#section-9" }}"
        class="list-group-item list-group-item-action list-group-item-info">Módulo 8: Coaching y desarrollo Económico.</a>
        
    </div>
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
              <li><a href="/index.html"><i class="fa-solid fa-house"></i></a></li>
              <li><a href="/HTML/prices_table.html">Crear Cuenta</a></li>
              <li><a href="/HTML/seguros.html">TEDÜ Seguros</a></li>
              <li><a href="/HTML/market.html">TEDÜ Market</a></li>
              <li><a href="/HTML/countdown_travel.html">TEDÜ Travel</a></li>
              <!-- <li><a href="/HTML/countdown_investment.html">TEDU Investment</a></li> -->
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
	  <script src="{{asset('main/js/jquery-3.3.1.min.js')}}"></script>

  <script>

  
$(function(){

  let logged='<?php echo \Session::get('md');?>';
  if(logged!=1){

    var si= $('#si').one('click',function(evt) {
      <?php session(['md' => 1]);;?>
      var myvar='<?php echo Crypt::decrypt(  \Session::get('tk'));?>';
      var email='<?php echo Auth()->user()->email;?>';
      var encryptedpas= CryptoJS.AES.encrypt("codidcicdi", "secret");
      var encryptedws= CryptoJS.AES.encrypt("ocdmomdcocdmcd", "secret");
      evt.preventDefault();
      window.open(
        `https://teduemprende.com/HTML/moodleauth.html?wstoken=${encryptedws}&email=${email}&token=${encryptedpas}&pass=${myvar}`,
        "_blank"
        );
        
      });
      
    }
      
    });
    
</script>
</body>

</html>