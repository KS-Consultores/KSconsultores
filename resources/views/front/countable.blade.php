@extends('front.layout.base')

@section('meta_page')
<title>KS Consultores | Cumplimiento contable oportuno</title>
<meta content="Garantizamos tu contabilidad electrónica conforme a las disposiciones fiscales. Recibe información sobre tus operaciones de manera integral y oportuna." name="description"/>

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="KS Consultores">
<meta itemprop="description" content="Garantizamos tu contabilidad electrónica conforme a las disposiciones fiscales. Recibe información sobre tus operaciones de manera integral y oportuna.">
<meta itemprop="image" content="{{ asset('front/img/banner-contable.jpg') }}">

<!-- Open Graph data -->
<meta property="og:title" content="KS Consultores | Cumplimiento contable oportuno" /> 
<meta property="og:image" content="{{ asset('front/img/banner-contable.jpg') }}" />
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="Garantizamos tu contabilidad electrónica conforme a las disposiciones fiscales. Recibe información sobre tus operaciones de manera integral y oportuna." />
@stop

@section('body_class')
    class="countable"
@stop

@section('view')

<section class="banner-intro img-cover flex align-middle align-center" style="background-image: url('{{ asset('front/img/banner-contable.jpg') }}')">
	<div class="banner-intro-info">
		<h1 class="banner-intro-title">Tu empresa está segura</h1>
		<h2 class="banner-intro-subtitle">cumplimiento contable oportuno</h2>
	</div>

	<div class="banner-intro-down">
		<a class="btn-custom" href="#intro">Ver Más</a>
		<a class="icon-down" href="#intro"><i class="icon-arrow-next"></i></a>
	</div>
</section>

<section class="about" id="intro">
	<div class="row">
		<div class="columns small-12">
			<p class="title-section">NUESTROS SERVICIOS</p>

			<p class="title-big">Contabilidad</p>

			<div class="slogan-section row align-middle text-center">
				<div class="small-2 medium-1"> 
					<span>“</span>
				</div>
				<div class="small-8 medium-10"> 
					<p>Mediante nuestro servicio de contabilidad, aplicamos normas contables en los procesos administrativos de tu empresa de forma alineada a las obligaciones<br /> emitidas por la autoridad. </p>
				</div>
				<div class="small-2 medium-1"> 
					<span>”</span>
				</div>
			</div>

			<div class="cta-section">
				<a class="btn-border" href="#contacto">Solicitar diagnóstico</a>
			</div>
		</div>
	</div>
</section>

<section class="banner-inter img-cover" style="background-image: url('{{ asset('front/img/banner-contable-1.jpg') }}')">
	<div class="row">
		<div class="columns small-12 flex align-middle">
			
			<div class="banner-inter-info">
				<div class="banner-inter-logo">
					<picture>
	                    <source media="min-width: 320px" srcset="{{asset('front/img/logo-section.png')}}, {{asset('front/img/logo-section@2x.png')}} 2x"><img src="{{asset('front/img/logo-section.png')}}" srcset="{{asset('front/img/logo-section@2x.png')}} 2x" alt="Ks consultores banner">
	                </picture>
				</div>
				<p class="banner-inter-title">Aplicamos normas contables en los procesos administrativos de tu empresa.</p>
			</div>
		</div>
	</div>
</section>

<section class="advantages">
	<div class="row">
		<div class="columns small-12">
			<p class="title-section">VENTAJAS</p>

			<p class="title-medium">¿Por qué confiar la contabilidad<br /> de tu empresa a KS Consultores? </p>
		</div>
	</div>
	<div class="row reason-list align-center">
		<div class="columns small-12 medium-6 large-4">
			<div class="reason-item text-center">
				<div class="reason-image">
					<picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/ventaja-contable-1.png')}}, {{asset('front/img/ventaja-contable-1@2x.png')}} 2x"><img src="{{asset('front/img/ventaja-contable-1.png')}}" srcset="{{asset('front/img/ventaja-contable-1@2x.png')}} 2x" alt="reason-1">
                    </picture>
				</div>
				<div class="reason-slogan">
					<p>Asesoría<br /> contable</p>
				</div>
				<p class="reason-description">Garantizamos tu contabilidad electrónica conforme a las disposiciones fiscales. </p>
			</div>
		</div>
		<div class="columns small-12 medium-6 large-4 with-line">
			<div class="line-left"></div>
			<div class="reason-item text-center">
				<div class="reason-image">
					<picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/ventaja-contable-2.png')}}, {{asset('front/img/ventaja-contable-2@2x.png')}} 2x"><img src="{{asset('front/img/ventaja-contable-2.png')}}" srcset="{{asset('front/img/ventaja-contable-2@2x.png')}} 2x" alt="reason-2">
                    </picture>
				</div>
				<div class="reason-slogan">
					<p>Procesos<br /> administrativos</p>
				</div>
				<p class="reason-description">Recibe información sobre tus operaciones de manera integral y oportuna.</p>
			</div>
			<div class="line-right"></div>
		</div>
		<div class="columns small-12 medium-6 large-4">
			<div class="reason-item text-center">
				<div class="reason-image">
					<picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/ventaja-contable-3.png')}}, {{asset('front/img/ventaja-contable-3@2x.png')}} 2x"><img src="{{asset('front/img/ventaja-contable-3.png')}}" srcset="{{asset('front/img/ventaja-contable-3@2x.png')}} 2x" alt="reason-3">
                    </picture></div>
				<div class="reason-slogan">
					<p>Contabilidad<br /> a la medida</p>
				</div>
				<p class="reason-description">Realizamos un diagnóstico empresarial para determinar tus necesidades específicas.</p>
			</div>
		</div>
	</div>
</section>

<section class="banner-inter img-cover" style="background-image: url('{{ asset('front/img/banner-contable-2.jpg') }}')">
	<div class="row">
		<div class="columns small-12">
			
			<div class="countable-services-info">
				
				<p class="countable-services-title">Conoce nuestros<br /> servicios contables:</p>

				<ul class="countable-services-list">
					<li><i class="icon-check"></i> Inicio de Operaciones (ALTA, IMSS, INFONAVIT, Estado)</li>
					<li><i class="icon-check"></i> Registros Contables</li>
					<li><i class="icon-check"></i> Contabilidad Electrónica</li>
					<li><i class="icon-check"></i> Manejo de Nómina </li>
					<li><i class="icon-check"></i> Declaraciones Informativas mensuales y anuales</li>
					<li><i class="icon-check"></i> Análisis de Costos</li>
					<li><i class="icon-check"></i> Revisión del Modelo de Negocios</li>
					<li><i class="icon-check"></i> Implementación de Procesos</li>
				</ul>

			</div>

		</div>
	</div>
</section>

<section class="contact" id="contacto">
	<div class="row">
		<div class="columns small-12">
			<p class="title-big">Diagnóstico contable</p>
			<div class="slogan-section row align-middle text-center">
				<div class="small-2 medium-1"> 
					<span>“</span>
				</div>
				<div class="small-8 medium-10"> 
					<p>Llena el siguiente formulario o llámanos al (33) 3641 0345 para conocer más sobre tus necesidades contables:</p>
				</div>
				<div class="small-2 medium-1"> 
					<span>”</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row contact-section">
		<div class="columns small-12 large-7">
			<form name="contact-form" id="contact-form" action="{{route('sendContact')}}" method="POST">
				<input type="hidden" name="team" id="team" value="2" />
				<input type="hidden" name="type" id="type" value="Contable" />
	            <div class="contact-form">
	             	<div class="row">
		                <div class="small-12">
		                	<span class="label-input">*Nombre</span>
		                  	<div class="input-custom">
		                   		<input name="name" type="text" id="name" maxlength="100">
		                  	</div>
		                </div>
	              	</div>
	              	<div class="row">
		                <div class="small-12">
		                	<span class="label-input">*E-mail</span>
			                <div class="input-custom">
			                    <input name="email" type="text" id="email">
			                </div>
		                </div>
	              	</div>
	              	<div class="row">
		                <div class="small-12">
		               		<span class="label-input">Teléfono</span>
		                  	<div class="input-custom">
		                    	<input name="phone" type="text" id="phone" maxlength="25">
		                  	</div>
		                </div>
	              	</div>
	              	<div class="row">
		                <div class="small-12">
		                	<span class="label-input">*Mensaje</span>
		                  	<div class="input-custom">
		                    	<textarea name="comments" id="comments" maxlength="255"></textarea>
		                 	</div>
		                </div>
	              	</div>

	              	<div class="block-button">
		                <input type="button" value="Solicitar diagnóstico" class="btn-border">
		            </div>

	              	<div class="retro"></div>

	             	<div class="loading">
				    	<div class="spinner">
				    		<div class="dot1"></div>
				    		<div class="dot2"></div>
				    	</div>
				    </div>
	            </div>
	        </form>
		</div>
		<div class="columns small-12 large-5 flex align-right">
			<div class="contact-info">
				<p class="contact-name">KS Consultores</p>
				<p class="contact-address">Calle Ricardo Palma 2955<br />C.P. 44670<br />Guadalajara, Jal.</p>
				<p class="contact-phones">Teléfonos: <a href="tel: +52 33 3641 0345">01 33 3641 0345</a><span>/</span><a href="tel: +52 33 3641 8038">3641-8038</a></p>

				<a class="contact-map" href="https://goo.gl/maps/rrU1eCHtu7G2" target="_blank">
					<img src="{{ asset('front/img/map.png') }}" />
				</a>

			</div>
		</div>
	</div>
</section>


@stop
