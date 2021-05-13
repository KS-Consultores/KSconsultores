@extends('front.layout.base')

@section('meta_page')
<title>KS Consultores | Conecta con nosotros</title>
<meta content="Diagnosticamos a tu empresa o proyecto y te orientamos a cumplir con todas tus obligaciones ante las autoridades." name="description"/>

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="KS Consultores">
<meta itemprop="description" content="Diagnosticamos a tu empresa o proyecto y te orientamos a cumplir con todas tus obligaciones ante las autoridades.">
<meta itemprop="image" content="{{ asset('front/img/banner-home.jpg') }}">

<!-- Open Graph data -->
<meta property="og:title" content="KS Consultores | Conecta con nosotros" /> 
<meta property="og:image" content="{{ asset('front/img/banner-home.jpg') }}" />
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="Diagnosticamos a tu empresa o proyecto y te orientamos a cumplir con todas tus obligaciones ante las autoridades." />
@stop

@section('body_class')
    class="contact-section"
@stop

@section('view')
<section class="contact">
	<div class="row">
		<div class="columns small-12">
			<p class="title-big">¡Conecta con nosotros!</p>
			<div class="slogan-section row align-middle text-center">
				<div class="small-2 medium-1"> 
					<span>“</span>
				</div>
				<div class="small-8 medium-10"> 
					<p>En KS Consultores diagnosticamos a tu empresa o proyecto y te orientamos a cumplir con todas tus obligaciones ante las autoridades.</p>
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
				<input type="hidden" name="team" id="team" value="5" />
	            <div class="contact-form">
	            	<div class="row">
	            		<div class="small-12">
	            			<p class="instructions">Completa este formulario para conocer más sobre tus necesidades y realizar un diagnóstico sobre tu empresa.</p>
	            		</div>
	            	</div>
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
		               		<span class="label-input">Tipo de asesoría que necesitas</span>
		                  	<div class="select-custom">
		                    	<select name="service" id="service">
		                    		<option value="Fiscal">Fiscal</option>
		                    		<option value="Contable">Contable</option>
		                    		<option value="Auditoría">Auditoría</option>
		                    		<option value="Legal">Legal</option>
		                    	</select>
		                  	</div>
		                </div>
	              	</div>
	              	<div class="row">
		                <div class="small-12">
		                	<span class="label-input">*Platícanos sobre tu empresa o proyecto</span>
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
				<p class="contact-name">
					KS Consultores<br />
					<a href="mailto:contacto@ksconsultores.com.mx">contacto@ksconsultores.com.mx</a>
				</p>
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
