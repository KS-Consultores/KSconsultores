@extends('front.layout.base') @section('meta_page')
<title>KS Consultores | Tu aliado Fiscal</title>
<meta content="Con experiencia contable, fiscal, administrativa y auditoría, encontramos juntos las mejores soluciones." name="description" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="KS Consultores">
<meta itemprop="description" content="Con experiencia contable, fiscal, administrativa y auditoría, encontramos juntos las mejores soluciones.">
<meta itemprop="image" content="{{ asset('front/img/banner-nosotros.jpg') }}">

<!-- Open Graph data -->
<meta property="og:title" content="KS Consultores | Tu aliado Fiscal" />
<meta property="og:image" content="{{ asset('front/img/banner-nosotros.jpg') }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="Con experiencia contable, fiscal, administrativa y auditoría, encontramos juntos las mejores soluciones." /> @stop @section('body_class') class="about-us" @stop @section('view')

<section class="banner-intro img-cover flex align-middle align-center" style="background-image: url('{{ asset('front/img/banner-nosotros.jpg') }}')">
    <div class="banner-intro-info">
        <h1 class="banner-intro-title">KS CONSULTORES</h1>
        <h2 class="banner-intro-subtitle">El cambio que te conviene</h2>
    </div>

    <div class="banner-intro-down">
        <a class="btn-custom" href="#intro">Ver Más</a>
        <a class="icon-down" href="#intro"><i class="icon-arrow-next"></i></a>
    </div>

</section>

<section class="about" id="intro">
    <div class="row">
        <div class="columns small-12">

            <div class="slogan-section row align-middle text-center">
                <div class="small-2 medium-1">
                    <span>“</span>
                </div>
                <div class="small-8 medium-10">
                    <p>En 2003 nuestro socio fundador, el CPC. Ernesto Ahumada Gutiérrez, unió la experiencia de consultores en materias de asesoría y gestión de negocios para crear KS Consultores <!--Ahumada Gutiérrez & Asociados, S.C. Una firma innovadora dedicada a ofrecer servicios fiscales, de auditoria y de gestión de negocios de manera integral.--> </p>
                </div>
                <div class="small-2 medium-1">
                    <span>”</span>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="banner-inter img-cover" style="background-image: url('{{ asset('front/img/banner-nosotros-1.jpg') }}')">

    <div class="row">
        <div class="columns small-12">
            <div class="banner-inter-info">
                <p class="banner-inter-title">Desde entonces, tenemos el <b>compromiso</b> de brindar soluciones personalizadas a cada uno de nuestros clientes. <!--en temas patrimoniales, seguridad social, impuestos al comercio exterior; y servicios en las áreas de auditoría.--></p>
                <p class="banner-inter-subtitle">Con la asesoría de KS Consultores, la experiencia y profesionalismo está de tu lado.</p>
            </div>
        </div>
    </div>

</section>

<section class="reasons">

    <div class="row reason-list align-center">
        <div class="columns small-12 medium-6 large-4">
            <div class="reason-item text-center">
                <div class="reason-image">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/mision-1.png')}}, {{asset('front/img/mision-1@2x.png')}} 2x"><img src="{{asset('front/img/mision-1.png')}}" srcset="{{asset('front/img/mision-1@2x.png')}} 2x" alt="mision-1">
                    </picture>
                </div>
                <p class="reason-title">Misión</p>

                <p class="reason-description">Lograr la satisfacción y <b>rentabilidad</b> de nuestros clientes a través de <b>soluciones integrales</b> <!--en materia fiscal y financiera--> diseñadas de forma objetiva, eficaz y estratégica.</p>
            </div>
        </div>
        <div class="columns small-12 medium-6 large-4 with-line">
            <div class="line-left"></div>
            <div class="reason-item text-center">
                <div class="reason-image">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/mision-2.png')}}, {{asset('front/img/mision-2@2x.png')}} 2x"><img src="{{asset('front/img/mision-2.png')}}" srcset="{{asset('front/img/mision-2@2x.png')}} 2x" alt="mision-2">
                    </picture>
                </div>
                <p class="reason-title">Visión</p>

                <!--<p class="reason-description">Consolidarnos como la firma especializada de consultores distinguida por brindar a nuestros clientes tranquilidad y seguridad en su entorno de negocio.</p>-->
                <p class="reason-description">Consolidarnos como firma <b>especializada</b> de asesores, distinguida por <b>brindar tranquilidad</b> y seguridad en su entorno de negocio</p>
            </div>
            <div class="line-right"></div>
        </div>
        <div class="columns small-12 medium-6 large-4">
            <div class="reason-item text-center">
                <div class="reason-image">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/mision-3.png')}}, {{asset('front/img/mision-3@2x.png')}} 2x"><img src="{{asset('front/img/mision-3.png')}}" srcset="{{asset('front/img/mision-3@2x.png')}} 2x" alt="mision-3">
                    </picture>
                </div>
                <p class="reason-title">Valores</p>

                <p class="reason-description">Actuamos con <b>ética</b> y nos comprometemos a brindar siempre un servicio personalizado y <b>confidencial</b> a cada uno de nuestros clientes.</p>
            </div>
        </div>
    </div>
</section>

<section class="certifications bg-gray">
    <div class="row">
        <div class="columns small-12">
            <p class="title-big">Certificaciones</p>
            <p class="subtitle-section">Certificaciones y afiliaciones que respaldan nuestra firma:</p>
        </div>
    </div>

    <div class="row certifications-list">
        <div class="columns small-12 medium-6 large-4">
            <div class="certification flex align-center align-bottom">
                <div class="certification-info">
                    <div class="certification-logo text-center">
                        <a href="http://imcp.org.mx/" target="_blank">
                            <picture>
                                <source media="min-width: 320px" srcset="{{asset('front/img/certificado-1.png')}}, {{asset('front/img/certificado-1@2x.png')}} 2x"><img src="{{asset('front/img/certificado-1.png')}}" srcset="{{asset('front/img/certificado-1@2x.png')}} 2x" alt="certificado 1">
                            </picture>
                        </a>
                    </div>
                    <div class="certification-title">Socios <br>(Capacitador externo)</div>
                </div>
            </div>
        </div>
        <div class="columns small-12 medium-6 large-4">
            <div class="certification flex align-center align-bottom">
                <div class="certification-info">
                    <div class="certification-logo text-center">
                        <a href="http://www.camaradecomerciogdl.mx/" target="_blank">
                            <picture>
                                <source media="min-width: 320px" srcset="{{asset('front/img/certificado-2.png')}}, {{asset('front/img/certificado-2@2x.png')}} 2x"><img src="{{asset('front/img/certificado-2.png')}}" srcset="{{asset('front/img/certificado-2@2x.png')}} 2x" alt="certificado 2">
                            </picture>
                        </a>
                    </div>
                    <div class="certification-title">Afiliados</div>
                </div>
            </div>
        </div>
       <!-- <div class="columns small-12 medium-6 large-4">
            <div class="certification flex align-center align-bottom">
                <div class="certification-info">
                    <div class="certification-logo text-center">
                        <picture>
                            <source media="min-width: 320px" srcset="{{asset('front/img/certificado-3.png')}}, {{asset('front/img/certificado-3@2x.png')}} 2x"><img src="{{asset('front/img/certificado-3.png')}}" srcset="{{asset('front/img/certificado-3@2x.png')}} 2x" alt="certificado 3">
                        </picture>
                    </div>
                    <div class="certification-title">Consultores</div>
                </div>
            </div>
        </div> 
        <div class="columns small-12 medium-6 large-4">
            <div class="certification flex align-center align-bottom">
                <div class="certification-info">
                    <div class="certification-logo text-center">
                        <a href="http://cicej.mx/" target="_blank">
                            <picture>
                                <source media="min-width: 320px" srcset="{{asset('front/img/certificado-4.png')}}, {{asset('front/img/certificado-4@2x.png')}} 2x"><img src="{{asset('front/img/certificado-4.png')}}" srcset="{{asset('front/img/certificado-4@2x.png')}} 2x" alt="certificado 4">
                            </picture>
                        </a>
                    </div>
                    <div class="certification-title">Participantes</div>
                </div>
            </div>
        </div> -->
        <div class="columns small-12 medium-6 large-4">
            <div class="certification flex align-center align-bottom">
                <div class="certification-info">
                    <div class="certification-logo text-center">
                        <picture>
                            <source media="min-width: 320px" srcset="{{asset('front/img/certificado-5.png')}}, {{asset('front/img/certificado-5@2x.png')}} 2x"><img src="{{asset('front/img/certificado-5.png')}}" srcset="{{asset('front/img/certificado-5@2x.png')}} 2x" alt="certificado 5">
                        </picture>
                    </div>
                    <div class="certification-title">Socio Director Certificado</div>
                </div>
            </div>
        </div>
        <div class="columns small-12 medium-6 large-4">
            <div class="certification flex align-center align-bottom">
                <div class="certification-info">
                    <div class="certification-logo text-center">
                        <picture>
                            <source media="min-width: 320px" srcset="{{asset('front/img/certificado-6.png')}}, {{asset('front/img/certificado-6@2x.png')}} 2x"><img src="{{asset('front/img/certificado-6.png')}}" srcset="{{asset('front/img/certificado-6@2x.png')}} 2x" alt="certificado 6">
                        </picture>
                    </div>
                    <div class="certification-title">Convenio</div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="alliances img-cover" style="background-image: url('{{ asset('front/img/alianzas.jpg') }}')">
    <div class="row">
        <div class="columns small-12">
            <div class="alliances-info">
                <p class="alliances-title">Alianzas estratégicas</p>
                <p class="alliances-description">Expandimos nuestros servicios y maximizamos los resultados a través de las siguientes alianzas estratégicas:</p>
                <ul class="alliances-list">
                    <li><i class="icon-check"></i> Defensa Tributaria</li>
                    <li><i class="icon-check"></i> Coaching empresarial y reclutamiento</li>
                    <!--<li><i class="icon-check"></i> Implementación de Desarrollo Organizacional</li>-->
                    <li><i class="icon-check"></i> Comercio Exterior</li>
                    <li><i class="icon-check"></i> Marcas y patentes</li>
                    <li><i class="icon-check"></i> Patrimonial</li>
                    <li><i class="icon-check"></i> Desarrollo de Modelo de Negocio</li>
                    <li><i class="icon-check"></i> Marketing digital</li>
                </ul>
            </div>
        </div>
    </div>

</section>

<section class="philanthropy">
    <div class="row">
        <div class="columns small-12">
            <!--<p class="title-section">Qué es KS Consultores</p>-->
            <p class="title-big">Filantropía</p>
            <p class="subtitle-section">Parte de nuestra filosofía consiste en ayudar a los demás a crecer y ser felices, por eso demostramos nuestro apoyo a las siguientes asociaciones: </p>
        </div>
    </div>

    <div class="row reason-list align-center">
        <div class="columns small-12 medium-6 large-4">
            <div class="reason-item text-center">
                <div class="reason-image flex align-middle align-center">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/filantropia-1.png')}}, {{asset('front/img/filantropia-1@2x.png')}} 2x"><img src="{{asset('front/img/filantropia-1.png')}}" srcset="{{asset('front/img/filantropia-1@2x.png')}} 2x" alt="mision-1">
                    </picture>
                </div>

                <p class="philanthropy-title">Socios</p>
                <p class="philanthropy-subtitle">CR Guadalajara Colomos AC</p>

            </div>
        </div>
        <div class="columns small-12 medium-6 large-4 with-line">
            <div class="line-left"></div>
            <div class="reason-item text-center">
                <div class="reason-image flex align-middle align-center">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/filantropia-2.png')}}, {{asset('front/img/filantropia-2@2x.png')}} 2x"><img src="{{asset('front/img/filantropia-2.png')}}" srcset="{{asset('front/img/filantropia-2@2x.png')}} 2x" alt="mision-2">
                    </picture>
                </div>

                <p class="philanthropy-title">Consejo</p>
                <p class="philanthropy-subtitle">Fundación <br />Roberto Chávez AC</p>

            </div>
            <div class="line-right"></div>
        </div>
        <div class="columns small-12 medium-6 large-4">
            <div class="reason-item text-center">
                <div class="reason-image flex align-middle align-center">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/filantropia-3.png')}}, {{asset('front/img/filantropia-3@2x.png')}} 2x"><img src="{{asset('front/img/filantropia-3.png')}}" srcset="{{asset('front/img/filantropia-3@2x.png')}} 2x" alt="mision-3">
                    </picture>
                </div>

                <p class="philanthropy-title">Colaboradores</p>
                <p class="philanthropy-subtitle">Casa Hogar <br />Kamami AC</p>

            </div>
        </div>
    </div>

</section>

<section class="team bg-gray">
    <div class="row">
        <div class="columns small-12">
            <p class="title-big">Equipo KS Consultores</p>
            <div class="slogan-section row align-middle text-center">
                <div class="small-2 medium-1">
                    <span>“</span>
                </div>
                <div class="small-8 medium-10">
                    <p>Con experiencia en tema de inmobiliario, fiscal, gestión de negocios y auditoría, <br />encontramos juntos las mejores soluciones.</p>
                </div>
                <div class="small-2 medium-1">
                    <span>”</span>
                </div>
            </div>
            <p class="title-section blue">Conoce a cada uno de los miembros de KS Consultores</p>
        </div>
    </div>
   <!-- <div class="row team-item align-middle">
        <div class="columns small-12 medium-4">
            <div class="team-info">
                <div class="team-image">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/man.png')}}, {{asset('front/img/man@2x.png')}} 2x"><img src="{{asset('front/img/man.png')}}" srcset="{{asset('front/img/man@2x.png')}} 2x" alt="man">
                    </picture>
                </div>
                <p class="team-name">Ernesto Ahumada</p>
                <p class="team-position">Socio Director</p>
            </div>
        </div>
        <div class="columns small-12 medium-8">
            <p class="team-description">El timón que busca la orientación y visión a seguir en KS Consultores. Ernesto, como buen estratega, guía a todos una vez abordo. Es Contador Público de formación, con amplia experiencia en la materia fiscal y auditoría. Cuenta con una Maestría en Impuestos por el Instituto de Especialización para Ejecutivos, A. C. Es Contador Público certificado ante la Administración General de Auditoría Fiscal Federal (AGAFF). Fungió como socio de SJF (Servicios Jurídicos y Fiscales), y actualmente es Socio Director de KS Consultores.</p>
        </div>
    </div>
    <div class="row team-item align-middle">
        <div class="columns small-12 medium-4">
            <div class="team-info">
                <div class="team-image">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/woman.png')}}, {{asset('front/img/woman@2x.png')}} 2x"><img src="{{asset('front/img/woman.png')}}" srcset="{{asset('front/img/woman@2x.png')}} 2x" alt="woman">
                    </picture>
                </div>
                <p class="team-name">Nora Pérez</p>
                <p class="team-position">Gerencia General</p>
            </div>
        </div>
        <div class="columns small-12 medium-8">
            <p class="team-description">Nora coordina y supervisa KS Consultores como Gerente, a través de la planeación estratégica y el trabajo en equipo, para lograr cumplir con los objetivos.<br />Es contadora de formación y cuenta con amplia experiencia en firmas fiscales y contables. Actualmente cursa la Maestría en Impuestos en el Instituto de Especialización para Ejecutivos, A.C. Organizada por naturaleza y de fuerte convicción, sabe cómo ayudar y cuidar hasta el último detalle de lo que acontece en KS Consultores. </p>
        </div>
    </div>
    <div class="row team-item align-middle">
        <div class="columns small-12 medium-4">
            <div class="team-info">
                <div class="team-image">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/man.png')}}, {{asset('front/img/man@2x.png')}} 2x"><img src="{{asset('front/img/man.png')}}" srcset="{{asset('front/img/man@2x.png')}} 2x" alt="man">
                    </picture>
                </div>
                <p class="team-name">Eduardo Quintero</p>
                <p class="team-position">Gerencia de Auditoría y Operaciones</p>
            </div>
        </div>
        <div class="columns small-12 medium-8">
            <p class="team-description">De actitud reservada, pero siempre atento. Eduardo transmite su forma de trabajo al resto de los colaboradores. Cuenta con el título de Contador Público y una Maestría en Impuestos por el Instituto de Especialización para ejecutivos, A.C. Eduardo coordina que los engranes de la firma trabajen de forma dinámica y ordenada, por lo que en KS Consultores cubre la materia contable, fiscal y auditoría.</p>
        </div>
    </div>
    <div class="row team-item align-middle">
        <div class="columns small-12 medium-4">
            <div class="team-info">
                <div class="team-image">
                    <picture>
                        <source media="min-width: 320px" srcset="{{asset('front/img/man.png')}}, {{asset('front/img/man@2x.png')}} 2x"><img src="{{asset('front/img/man.png')}}" srcset="{{asset('front/img/man@2x.png')}} 2x" alt="man">
                    </picture>
                </div>
                <p class="team-name">Osvaldo Aguayo</p>
                <p class="team-position">Administrador</p>
            </div>
        </div>
        <div class="columns small-12 medium-8">
            <p class="team-description">El buen oyente de KS Consultores, Osvaldo se ha convertido en el conciliador por excelencia de la firma. Es licenciado en Administración con experiencia en los departamentos de administración de diversos giros de compañías. Se incorpora a KS Consultores para cubrir la logística interna de la consultoría y brindar el soporte de recursos humanos a todos los colaboradores.</p>
        </div>
    </div> -->
</section>

<section class="areas bg-gray">
    <div class="row">
        <div class="columns small-12">
            <p class="title-big">Áreas</p>
        </div>
    </div>
    <div class="row areas-list align-center">
        <div class="columns small-12 medium-6 large-4">
            <div class="areas-image text-center">
                <img src="{{asset('front/img/area-1.jpg')}}" alt="contabilidad" />
            </div>
            <p class="areas-title">Patrimonio (Inmobiliario)</p>
            <!--<p class="areas-description">Esta área de KS es la responsable de cubrir las necesidades de nuestros clientes en su contabilidad, en donde interviene toda la estructura de contadores; profesionistas en atender y solucionar dudas respecto a la materia, que con sus múltiples personalidades generan un excelente ambiente de trabajo, que se refleja con los resultados y satisfacción de nuestros clientes.</p>-->
            <p class="areas-description">En esta área nuestros asesores buscan una adecuada implementación inmobiliaria, de acuerdo a las mejores prácticas y los mecanismos jurídicos de control para respaldar tus operaciones. Falta detallar el servicio</p>
        </div>
        <div class="columns small-12 medium-6 large-4">
            <div class="areas-image text-center">
                <img src="{{asset('front/img/area-2.jpg')}}" alt="fiscal" />
            </div>
            <p class="areas-title">Fiscal</p>
            <!--<p class="areas-description">Es el área especializada por excelencia, en ella desembocan temas relevantes de las asesorías brindadas, las cuales se trabajan estratégicamente para lograr una correcta toma de decisión respecto a los temas fiscales que acontecen.<br />Con la peculiaridad del equipo, demuestran que con lo alegres y dinámicos que son, la presión esta de su lado.</p>-->
            <p class="areas-description">El cumplimento de las obligaciones fiscales hoy en día, resultan ser más relevantes para el desarrollo de las empresas, por ello en KS les ofrecemos intervenciones de alto valor con nuestros asesores especializados en el tema. Falta detallar el servicio</p>
        </div>
        <div class="columns small-12 medium-6 large-4">
            <div class="areas-image text-center">
                <img src="{{asset('front/img/area-3.jpg')}}" alt="auditoría" />
            </div>
            <p class="areas-title">Auditoría</p>
           <!-- <p class="areas-description">Es el departamento que lleva a cabo todas las operaciones de intervención en las auditorias, fiscales, IMSS, Financieras, costos y específicas, que requieran nuestros clientes, con su forma directa y organizada, logran sacar abante su opción acertada, con resultados favorables para nuestros clientes.</p>-->
            <p class="areas-description">Dentro de nuestras revisiones detectamos irregularidades o anomalías generando información relevante para la prevención de control interno e incumplimiento con las autoridades y sea referente para la toma de decisiones. Falta detallar el servicio</p>
        </div>
    </div>
</section>




@stop