@extends('front.layout.master')

@section('meta')
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta_page')

@stop

@section('styles')
    <!--[if IE]><link rel="shortcut icon" href="/front/img/favicon.ico"><![endif]-->
    <link rel="icon" href="{{asset('/front/img/favicon.ico')}}">

    <link href="{{asset('/front/css/styles.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    
    @yield('styles_page')

    <style>
        .cover-hidden{
            width: 100%;
            height: 100%;
            position: fixed;
            top:0px;
            left: 0px;
            z-index: 10000;
            background-color: #ffffff;
            padding: 20% 0px;
        }

        .cover-hidden .loading{
            display: block;
            
        }

        .cover-hidden .loading .spinner {
            margin: 0px auto;
            width: 60px;
            height: 60px;
            position: relative;
            text-align: center;

            -webkit-animation: sk-rotate 2.0s infinite linear;
            animation: sk-rotate 2.0s infinite linear;
        }

        .cover-hidden .loading .dot1, .cover-hidden .loading .dot2 {
            width: 60%;
            height: 60%;
            display: inline-block;
            position: absolute;
            top: 0;
            background-color: #0097AA;
            border-radius: 100%;

            -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
            animation: sk-bounce 2.0s infinite ease-in-out;
        }

        .cover-hidden .loading .dot2 {
            top: auto;
            bottom: 0;
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        @-webkit-keyframes sk-rotate { 100% { -webkit-transform: rotate(360deg) }}
        @keyframes sk-rotate { 100% { transform: rotate(360deg); -webkit-transform: rotate(360deg) }}

        @-webkit-keyframes sk-bounce {
            0%, 100% { -webkit-transform: scale(0.0) }
            50% { -webkit-transform: scale(1.0) }
        }

        @keyframes sk-bounce {
            0%, 100% { 
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            } 50% { 
                transform: scale(1.0);
                -webkit-transform: scale(1.0);
            }
        }
    </style>

@stop

@section('body')

    <input type="hidden" name="_token" value="{{ csrf_token() }}" class="token" />
    
    <div class="cover-hidden">
        <div class="loading">
            <div class="spinner">
              <div class="dot1"></div>
              <div class="dot2"></div>
            </div>
        </div>
    </div>

	<header class="Header">
        <nav class="Header-web row align-top">
            <div class="Header-logo medium-3 large-4">
                <a href="{{ route('index') }}">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/logo.png')}}, {{asset('front/img/logo@2x.png')}} 2x"><img src="{{asset('front/img/logo.png')}}" srcset="{{asset('front/img/logo@2x.png')}} 2x" alt="Logo">
                    </picture>
                </a>
            </div>
            <ul class="Header-web-menu medium-9 large-8 flex align-right dropdown menu" data-dropdown-menu data-closing-time="10">
                <li>
                    <a href="{{ route('index') }}" class="@if( Request::url() == route('index') ) current @endif">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('aboutus') }}" class="@if( Request::url() == route('aboutus') ) current @endif">Nosotros</a>
                </li>
                <li>
                    <a class="@if( Request::url() == route('fiscal') || Request::url() == route('audit') || Request::url() == route('countable') || Request::url() == route('legal')) current @endif">Servicios</a>
                    <ul class="menu">
                        <li>
                            <a href="{{route('fiscal')}}">Fiscal</a>
                        </li>
                        <li>
                            <a href="{{route('audit')}}">Auditoría</a>
                        </li>
                        <li>
                            <a href="{{route('countable')}}">Contable</a> 
                        </li>
                        <li>
                            <a href="{{route('legal')}}">Legal</a> 
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('blog') }}" class="@if(Request::url() == route('blog') || Request::url() == route('results') ) current @endif">Blog</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="@if( Request::url() == route('contact') ) current @endif">Contacto</a> 
                </li>
            </ul>
        </nav>

        <nav class="Header-mobile row">
            <div class="Header-logo small-6">
                <a href="{{ route('index') }}">
                    <img src="/front/img/logo.png" />
                </a>
            </div>
            <div class="Header-mobile-show small-6 align-middle align-right">
                <div class="icon-mobile">
                    <i class="icon-menu-rounded"></i>
                </div>
            </div>
        </nav>

        <ul class="Header-mobile-menu">
            <li>
                <a href="{{ route('index') }}" class="@if( Request::url() == route('index') ) current @endif">Inicio</a>
            </li>
            <li>
                <a href="{{ route('aboutus') }}" class="@if( Request::url() == route('aboutus') ) current @endif">Nosotros</a>
            </li>
            <li>
               <a class="@if( Request::url() == route('fiscal') || Request::url() == route('audit') || Request::url() == route('countable') || Request::url() == route('legal')) current @endif">Servicios</a>
                <ul>
                    <li>
                        <a href="{{route('fiscal')}}">Fiscal</a>
                    </li>
                    <li>
                        <a href="{{route('audit')}}">Auditoría</a>
                    </li>
                    <li>
                        <a href="{{route('countable')}}">Contable</a> 
                    </li>
                    <li>
                        <a href="{{route('legal')}}">Legal</a> 
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('blog') }}" class="@if(Request::url() == route('blog') || Request::url() == route('results') ) current @endif">Blog</a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="@if( Request::url() == route('contact') ) current @endif">Contacto</a> 
            </li>
        </ul>
	</header>

    @yield('view')

	<footer>
        <section class="Bottom">
            <div class="row">
                <div class="small-12 large-6">
                    <div class="links-footer flex align-middle">
                    
                        <a class="logo-footer" href="{{ route('index') }}">
                            <picture>
                                <source media="min-width: 320px" srcset="{{asset('front/img/logo-footer.png')}}, {{asset('front/img/logo-footer@2x.png')}} 2x"><img src="{{asset('front/img/logo-footer.png')}}" srcset="{{asset('front/img/logo-footer@2x.png')}} 2x" alt="Logo">
                            </picture>
                        </a>
                        <div class="social-links flex align-middle">
                            <a href="https://www.facebook.com/ksconsultoresgdl/" target="_blank">
                                <i class="icon-facebook"></i>
                            </a>
                            
                            <a href="https://www.linkedin.com/company-beta/11268329/admin/updates/" target="_blank">
                                <i class="icon-linkedin2"></i>
                            </a>
                            <a href="https://twitter.com/KSConsultoresO" target="_blank">
                                <i class="icon-twitter"></i>
                            </a>
                        </div>

                        <a class="link-contact" href="{{ route('contact') }}">Contacto</a>    

                    </div>
                    <div class="info-footer">
                        <p> 
                            <i class="icon-pin"></i>
                            KS Consultores Calle Ricardo Palma 2955 C.P. 44670 Guadalajara, Jal.
                        </p>
                        <p class="Bottom-copy">
                            &copy; Copyright KS Consultores 2016 Todos los derechos reservados.
                        </p>
                    </div>
                </div>
                <div class="small-12 large-6 flex align-right">
           <!--          <div class="logo-intagono">
                        <a href="http://intagono.com/es/" target="_blank">
                            <picture>
                                <source media="min-width: 320px" srcset="{{asset('front/img/logo-intagono.png')}}, {{asset('front/img/logo-intagono@2x.png')}} 2x"><img src="{{asset('front/img/logo-intagono.png')}}" srcset="{{asset('front/img/logo-intagono@2x.png')}} 2x" alt="Logo Intagono">
                            </picture>
                        </a>
                    </div> -->
                    <br><br>
                    <div class="info-footer">
                        <p class="Bottom-phones">
                            <i class="icon-phone"></i> Teléfonos: 
                            <a href="tel: +52 33 4162 2881"> 01-33-4162-2881</a>
                        </p>
                        <a class="mail-footer" href="mailto:administracion@ksconsultores.com.mx">administracion@ksconsultores.com.mx</a>
                    </div>
                </div>
            </div>
        </section>
	</footer>
        <script>(function(v,p){
var s=document.createElement('script');
s.src='https://app.toky.co/resources/widgets/toky-widget.js?v='+v;
s.onload=function(){Toky.load(p);};
document.head.appendChild(s);
})('5c543bb', {"$lang":"es","$show_option":true,"$username":"KSConsultores","$audio":true,"$bubble_title":"Hola!","$bubble_message":"Estamos aquí para ayudarte. Haz clic en el botón de abajo para llamarnos","$position":"left","$text":"Llámanos Gratis","$color":"blue","$radio":"35"})
</script>
@stop

@section('javascript')
    
    <script async src="{{asset('front/js/scripts.js')}}"></script>

    @yield('javascript_page')

@stop