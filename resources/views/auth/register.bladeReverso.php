@extends('layouts.app')

@section('content')
<style>

input[type=submit] {
  background-color: #04AA6D;
  color: white;
}

#message {
  display:none;
  color: #000;
  position: relative;
}

#message p {
  font-size: 15px;
}

.valid {
  color: green;
}
.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}
.invalid {
  color: red;
}
.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
.center{
    position:absolute;
    left:20vw;
}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI/Cédula') }}</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="nombres" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <small>Por favor registre un correo que use frecuentemente.</small>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                         <div class="row mb-3">
                            <label for="celular" class="col-md-4 col-form-label text-md-end">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular">

                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                       
                            <div class="row mb-3">
                                <label for="referente" class="col-md-4 col-form-label text-md-end">{{ __('Código de Referido') }}</label>

                                <div class="col-md-6">
                                    <input id="referente" type="text" class="form-control @error('referente') is-invalid @enderror" name="referente" value="{{ old('referente') }}" autocomplete="referente">
                                    <small>En caso de no tener referido dejar el campo vacío</small>
                                    @error('referente')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <div id="message" class="center">
                                        <p>La contraseña debe contener lo siguiente:</p>
                                        <p id="letter" class="invalid">Al menos una letra <b>Minúscula</b> </p>
                                        <p id="capital" class="invalid">Al menos una letra <b>Mayúscula</b></p>
                                        <p id="number" class="invalid">Al menos un <b>número</b></p>
                                        <p id="length" class="invalid">Mínimo <b>8 caracteres</b></p>
                                    </div>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="aceptatermino" class="col-md-4 col-form-label text-md-end">{{ __('Acepta términos y condiciones TEDU para la suscripción PRO?') }}</label>

                            <div class="col-md-6">
                                 <label class="form-check-label">
    								<input type="checkbox" name="aceptatermino" class="form-check-input" checked>
  								</label>
                            </div>
                            <ul class="nav justify-content-center">
  								<li class="nav-item">
    									<a class="nav-link active" href="https://www.teduemprende.com/pdf/CONTRATO%20DE%20MEMBRESIA%20ENTRE%20TEDU%20Y%20EL%20ASOCIADO%20INDEPENDIENTE.pdf" target="_blank">Contrato de Membresía</a>
  								</li>
 								<li class="nav-item">
    									<a class="nav-link" href="https://www.teduemprende.com/pdf/TERMINOS%20Y%20CONDICIONES%20DE%20USO%20DE%20LA%20PA%CC%81GINA%20WEB%20TEDU.pdf" target="_blank">Terminos y Condiciones</a>
  								</li>
  								<li class="nav-item">
   									    <a class="nav-link" href="https://www.teduemprende.com/pdf/PFD_CODIGO%20DE%20ETICA%20TEDU.pdf" target="_blank">Código de Ética</a>
  								</li>
  								<li class="nav-item">
    									<a class="nav-link" href="https://www.teduemprende.com/pdf/CONTRATO%20MULTINIVEL%20TEDU%20SAS.pdf" target="_blank">Contrato multinivel</a>
  								</li>
							</ul>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="form-login" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('main/js/jquery-3.3.1.min.js')}}"></script>

				
<script>

$(function(){

    const urlParams=new URLSearchParams(window.location.search);
    let afiliadoParam = null;

    for (const [key, value] of urlParams) {
    if (key === "referido") {
        afiliadoParam = value;
        break; // exit the loop once the "referido" parameter is found
    }
    }
        const regex = /^[A-Z]{2}\d{4}$/;
        if (regex.test(afiliadoParam)) {
        $("#referente").val(afiliadoParam);
        $("#referente").prop( "readonly", true );

        }
	 $('#form-login').submit(function(e) {
            e.preventDefault(); // don't submit multiple times
            
            $("#referente").prop( "disabled", false );
            this.submit(); // use the native submit method of the form element
        });


});

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
@endsection

