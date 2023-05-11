<!-- volver aqui -->

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Emprendimiento y Negocios">
    <!-- Bootstrap CSS -->

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('main/css/style.css') }}"> -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="{{ asset('main/css/owl.carousel.min.css') }}">
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="{{ asset('main/css/owl.theme.default.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="/css/login_tedu.css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('main/css/login_tedu.css') }}"> -->
    <script src="https://kit.fontawesome.com/0854984c4f.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="/css/registro.css" /> -->
    <link rel="stylesheet" href="{{ asset('/css/registro.css') }}" />
    <!-- <link rel="icon" href="/Img/TEDU-ICO.ico"> -->
    <!-- <link rel="icon" href="{{ asset('assets/lte/dist/img/TEDU-ICO.ico') }}"> -->
    <link rel="icon" href="{{ asset('main/images/TEDU-ICO.ico') }}">
    <!-- <link rel="stylesheet" href="{{ asset('main/css/bootstrap.min.css') }}"> -->



    <title>Login Tedü</title>
    {!! htmlScriptTagJsApi(['lang' => 'es']) !!}
</head>

<header>
    <div>
        <!-- <a href="/index.html" class="close">&times;</a> -->
        <a href="https://www.teduemprende.com/" class="close">&times;</a>
    </div>
</header>

<body>
    <div class="registration-form">
        <div class="text-center">
            <img class="modal-img" src="{{ asset('images/logo.png') }}">
        </div>
        <div class="body">
            <div class="content active" id="signin">
                <h1 class="display-4">Login de Acceso</h1>
                <p class="mesage">Si ya eres miembro de la Tribu accede con tu email registrado</p>


                <div class="bar"></div>

                <!-- <form action="#"> -->
                <form action="{{ route('login') }}" method="post" role="form" id="form-login">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <!-- <input type="text" name="username" id="username" class="input-elem" placeholder=" " autocomplete="off" /> -->
                        <label for="username">Correo</label>

                        <!-- <input type="text" class="input-elem form-control"  placeholder="Correo electronico" id="email" name="email" -->
                        <input type="text" class=" form-control input-elem" placeholder="Correo electronico"
                            id="email" name="email" @error('email') is-invalid @enderror
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        {!! $errors->first(
                            'email',
                            '<div class="row"><br><br><br><br><br><span class="help-block text-danger" style="color: red !important">:message</span></div>',
                        ) !!}


                    </div>
                    <div class="input-group">
                        <!-- <input type="password" name="" id="password" class="input-elem" placeholder=" "
                            autocomplete="off" /> -->

                        <label for="password">Contraseña</label>
                        <input type="password" class="input-elem form-control" placeholder="Su clave de ingreso"
                            id="password" name="password" @error('password') is-invalid @enderror required
                            autocomplete="current-password" id="password">
                        {!! $errors->first('password', '<span class="help-block text-danger">:message</span>') !!}
                        <i class="fas fa-eye-slash eye" id="psicon"></i>
                    </div>
                    <div class="agreements">
                        @if (Route::has('password.request'))
                            {{-- <a href="{{ route('password.request') }}" class="mesage">¿Olvidaste tu contraseña?</label> --}}
                            <label for="rem_pass" class="mesage">¿Olvidaste tu contraseña?
                                <a href="{{ route('password.request') }}" class="stretched-link">
                                    Clic aquí.</a>

                            </label>
                        @endif
                    </div>
                    <!-- <a href="https://www.teduemprende.com/"  class="btn btn-brand">Cerrar</a> -->
                    <button type="submit"class="btn btn-brand">Continuar</button>
                    <br>
                    <br>
                    <label for="rem_pass" class="mesage">¿Primera vez en TEDÜ?
                        <a href="{{ route('register') }}" class="stretched-link">
                            Regístrate.</a>

                    </label>

                    <br>
                    <label for="rem_pass" class="mesage">¿Necesitas ayuda?<a
                            href="https://teduemprende.com/HTML/info.html" class="stretched-link"> Más
                            Info.</a></label>
                    <br>
                    <br>
                    <a href="https://teduemprende.com/HTML/ventana_modal_term_condic.html">Terminos y condiciones
                        TEDÜ</a>
                </form>
            </div>
            </form>
        </div>
    </div>
    </div>

    <!-- <script src="/js/registro.js" defer></script> -->
    <!-- <script src="{{ asset('main/js/main.js') }}"></script> -->
    <!-- <script src="{{ asset('main/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main/js/popper.min.js') }}"></script> -->

    <script src="{{ asset('main/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('main/js/popper.min.js') }}"></script>
    <script src="{{ asset('main/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main/js/main.js') }}"></script>
    <script>
        $(function() {





            $('#psicon').click(function(e) {

                var ps = $('#password')
                if (ps.attr('type') === "password") {
                    ps.prop("type", "text");
                    $('#psicon').removeClass('fa-eye-slash');
                    $('#psicon').addClass('fa-eye');

                } else {
                    ps.prop("type", "password");
                    $('#psicon').removeClass('fa-eye');

                    $('#psicon').addClass('fa-eye-slash');
                }
            });



        });
    </script>
</body>

</html>
