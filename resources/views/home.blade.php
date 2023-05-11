@extends('themes/lte/layaout')
@section('otrolink')
@endsection
@section('titulo')
Mi código de referencia es: <strong>{{Auth()->user()->micodigo}}</strong>
@endsection

@section('contenedor')


<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" />

<div class="row">
    <div class='col-md-12'>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('danger'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('danger') !!}</li>
                </ul>
            </div>
        @endif
       
            @if (Auth()->user()->plan_id==2 )
                <div class="card-header bg-info ">
                    <h3 class="card-title">
                        Felicidades, ahora eres miembro PRO - {{ explode(' ', Auth()->user()->name)[0] }}... Ya puedes compartir tu Link de Afiliado!
                    </h3>
			</br>
		     <div class="share" id="share"></div>
                </div>
            @else
                <div class="container justify-content-center" style="position:relative; left:12vw; right:20vw !important; ">
        
                    <button class="btn btn-danger" type="button"  onclick="location.href='/public/comprarplan';"><span style="padding-left:15vw ;padding-right:15vw">Comprar Plan Pro <i class="fa fa-thumbs-up" aria-hidden="true"></i> </span></button>
                </div>
		
            @endif
            

           
    </div>

</div>

<section class="academy" id="academy">

<div class="content">
    <div class="box">
        <div class="imgBx">
        @if (Auth()->user()->plan_id==2 || Auth()->user()->categoria_users_id==1 || Auth()->user()->categoria_users_id==2)

        <a href="{{route('usuarios.mired')}}">
        @else  
            <a href="{{route('comprarplan')}}">
        @endif
            <img src="{{asset('images/Tedu_socio_card.svg')}}"  alt="">
        </div>
        </a>
    </div>
    <div class="box">
        <div class="imgBx">
        @if (Auth()->user()->plan_id==2 || Auth()->user()->categoria_users_id==1 || Auth()->user()->categoria_users_id==2)

        <a href="{{route('market')}}">
        @else  
            <a href="{{route('comprarplan')}}">
        @endif
            <img src="{{asset('images/Tedu_market_card.svg')}}" alt="">
        </div>
        </a>
    </div>
    <div class="box">
        <div class="imgBx">
        @if (Auth()->user()->plan_id==2 || Auth()->user()->categoria_users_id==1 || Auth()->user()->categoria_users_id==2)

        <a href="{{route('listacursos')}}">
        @else  
            <a href="{{route('comprarplan')}}">
        @endif
            <img  src="{{asset('images/Tedu_academy_card.svg')}}"alt="">
        </a>
        </div>
    </div>
</div>

<script src="{{asset('main/js/jquery-3.3.1.min.js')}}"></script>

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

@endsection

@section('script-abajo')

@endsection
