@extends('front.layout.base')

@section('meta_page')
<title>KS Consultores | Fiscalistas | Auditores | Abogados</title>
<meta content="La mejor Firma en Guadalajara de Consultores Fiscales, Auditores y especializados en Asesoría Financiera. Garantizamos tu tranquilidad fiscal, financiera y empresarial." name="description"/>

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="KS Consultores">
<meta itemprop="description" content="La mejor Firma en Guadalajara de Consultores Fiscales, Auditores y especializados en Asesoría Financiera. Garantizamos tu tranquilidad fiscal, financiera y empresarial.">
<meta itemprop="image" content="{{ asset('front/img/banner-home.jpg') }}">

<!-- Open Graph data -->
<meta property="og:title" content="KS Consultores | Fiscalistas | Auditores | Abogados" /> 
<meta property="og:image" content="{{ asset('front/img/banner-home.jpg') }}" />
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="La mejor Firma en Guadalajara de Consultores Fiscales, Auditores y especializados en Asesoría Financiera. Garantizamos tu tranquilidad fiscal, financiera y empresarial." />
@stop

@section('body_class')
    class="home"
@stop

@section('view')

<section class="banner-intro img-cover flex align-middle align-center" style="background-image: url('{{ asset('front/img/banner-home.jpg') }}')">
	<div class="banner-intro-info">
		<h1 class="banner-intro-title">EN <b>KS CONSULTORES</b></h1>
		<h2 class="banner-intro-subtitle">Garantizamos tu tranquilidad <b>fiscal, financiera</b> y empresarial</h2>
	</div>
	<div class="banner-intro-down">
		<a class="btn-custom" href="#intro">Ver Más</a>
		<a class="icon-down" href="#intro"><i class="icon-arrow-next"></i></a>
	</div>
</section>

<section class="about" id="intro">
	<div class="row">
		<div class="columns small-12">
			<p class="title-section"></p>

			<p class="title-big"><b>KS Consultores</b></p>

			<p class="subtitle-section">Unimos la  experiencia <b>Inmobiliaria, Patrimonial y Fiscal</b> para crear <b>soluciones integrales con nuestra experiencia de más de 25 años, con un equipo ético y profesional, la asesoría que te garantice tu seguridad y tranquilidad.</b></p>

			<div class="slogan-section row align-middle text-center">
				<div class="small-2 medium-1"> 
					<span>“</span>
				</div>
				<div class="small-8 medium-10"> 
					<!--<p>Sumamos la experiencia de consultores en materia de <b>asesoría fiscal, contabilidad, auditoría y legal</b> para crear KS Consultores, una firma innovadora dedicada a ofrecer soluciones personalizadas a empresarios, compañías consolidadas y emprendedores. </p>-->
					<p>Somos una firma <b>innovadora y en constante actualización</b> dedicada a ofrecer soluciones personalizadas a las empresas de manera integral</p>
				</div>
				<div class="small-2 medium-1"> 
					<span>”</span>
				</div>
			</div>
		</div>
	</div>
	
</section>

<section class="banner-inter img-cover" style="background-image: url('{{ asset('front/img/banner-home-1.jpg') }}')">

	<div class="row">
		<div class="columns small-12">
			<div class="banner-inter-info">
				<p class="banner-inter-title">¡Mejoramos la toma de decisiones y minimizamos tus <b>riesgos patrimoniales, fiscales y financieros!</b></p>
				<!--<p class="banner-inter-subtitle">En KS Consultores solucionamos todo tipo de <b>problemas contables, fiscales y patrimoniales</b> a empresas de diversos giros.</p>-->
			</div>
		</div>
	</div>
	
</section>

<section class="reasons bg-gray">
	<div class="row">
		<div class="columns small-12">
			<p class="title-section">Tres razones para elegir</p>

			<p class="title-big">KS Consultores:</p>
		</div>
	</div>
	<div class="row reason-list align-center">
		<div class="columns small-12 medium-6 large-4">
			<div class="reason-item text-center">
				<div class="reason-image">
					<picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/reason-1.png')}}, {{asset('front/img/reason-1@2x.png')}} 2x"><img src="{{asset('front/img/reason-1.png')}}" srcset="{{asset('front/img/reason-1@2x.png')}} 2x" alt="reason-1">
                    </picture>
				</div>
				<p class="reason-title">Soluciones confiables</p>
				<div class="reason-slogan">
					<p>Más de 25 años de experiencia</p>
				</div>
				<p class="reason-description">Ofrecemos <b>soluciones integrales</b> que nos permiten cubrir todas las necesidades <b>patrimoniales, fiscales</b> y con valor agregado todo aquello relacionado con la gestión de tu negocio. </p>
			</div>
		</div>
		<div class="columns small-12 medium-6 large-4 with-line">
			<div class="line-left"></div>
			<div class="reason-item text-center">
				<div class="reason-image">
					<picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/reason-2.png')}}, {{asset('front/img/reason-2@2x.png')}} 2x"><img src="{{asset('front/img/reason-2.png')}}" srcset="{{asset('front/img/reason-2@2x.png')}} 2x" alt="reason-2">
                    </picture>
				</div>
				<p class="reason-title">Asesoría personalizada</p>
				<div class="reason-slogan">
					<p>Vamos <br />contigo</p>
				</div>
				<p class="reason-description">Compartimos nuestra experiencia profesional para acompañarte en el <b>crecimiento de tu empresa.</b></p>
			</div>
			<div class="line-right"></div>
		</div>
		<div class="columns small-12 medium-6 large-4">
			<div class="reason-item text-center">
				<div class="reason-image">
					<picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/reason-3.png')}}, {{asset('front/img/reason-3@2x.png')}} 2x"><img src="{{asset('front/img/reason-3.png')}}" srcset="{{asset('front/img/reason-3@2x.png')}} 2x" alt="reason-3">
                    </picture></div>
				<p class="reason-title">Personal especializado</p>
				<div class="reason-slogan">
					<p>Siempre a la <br />vanguardia</p>
				</div>
				<p class="reason-description">Contamos con personal <b>técnico especializado</b>, experimentado y actualizado en impuestos, seguridad social y <b>tecnologías de información.</b></p>
			</div>
		</div>
	</div>
</section>

<section class="home-services">
	<div class="row">
		<div class="columns small-12">
			<p class="title-big">SERVICIOS</p>
			<p class="subtitle-section">Cumple con tus <b>obligaciones fiscales</b> a través de nuestros servicios:</p>
		</div>
	</div>
	<div class="row service-list">
		<div class="columns small-12 medium-6">
			<div class="service img-cover flex align-bottom" style="background-image: url('{{ asset('front/img/servicio-1.jpg') }}')">
				<div class="service-item">
					<p>Implementación de <b>soluciones fiscales</b> personalizadas</p>
					<div class="service-cta flex">
						<span><b>Fiscal</b></span>
						<a class="btn-next flex align-middle align-center" href="{{route('fiscal')}}"><i class="icon-arrow-next2"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="columns small-12 medium-6">
			<div class="service img-cover flex align-bottom" style="background-image: url('{{ asset('front/img/servicio-2.jpg') }}')">
				<div class="service-item">
					<p>Alta experiencia en materia de <b>bienes raíces</b>, Te ofrecemos un respaldo integral</p>
					<div class="service-cta flex">
						<span><b>Patrimonial</b></span>
						<a class="btn-next flex align-middle align-center" href="{{route('countable')}}"><i class="icon-arrow-next2"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="columns small-12 medium-6">
			<div class="service img-cover flex align-bottom" style="background-image: url('{{ asset('front/img/servicio-3.jpg') }}')">
				<div class="service-item">
					<p>Mediante normas y nuestra experiencia evaluamos controles y <b>riesgos de tu empresa</b> para la toma de decisiones.</p>
					<div class="service-cta flex">
						<span><b>Auditoría</b></span>
						<a class="btn-next flex align-middle align-center" href="{{route('audit')}}"><i class="icon-arrow-next2"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="columns small-12 medium-6">
			<div class="service img-cover flex align-bottom" style="background-image: url('{{ asset('front/img/servicio-4.jpg') }}')">
				<div class="service-item">
					<p>A través de nuestras <b>alianzas</b> brindamos asesoría legal oportuna por parte de profesionales en asuntos administrativos</p>
					<div class="service-cta flex">
						<span><b>Legal</b></span>
						<a class="btn-next flex align-middle align-center" href="{{route('legal')}}"><i class="icon-arrow-next2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@stop
