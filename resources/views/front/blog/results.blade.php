@extends('front.layout.base')

@section('meta_page')
<title>KS Consultores | Fiscalistas | Auditores | Abogados</title>
<meta content="Unimos la  experiencia contable, fiscal y financiera para crear soluciones integrales. Garantizamos tu tranquilidad fiscal, financiera y empresarial" name="description"/>

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="KS Consultores">
<meta itemprop="description" content="Unimos la  experiencia contable, fiscal y financiera para crear soluciones integrales. Garantizamos tu tranquilidad fiscal, financiera y empresarial">
<meta itemprop="image" content="{{ asset('front/img/banner-home.jpg') }}">

<!-- Open Graph data -->
<meta property="og:title" content="KS Consultores | Fiscalistas | Auditores | Abogados" /> 
<meta property="og:image" content="{{ asset('front/img/banner-home.jpg') }}" />
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="Unimos la  experiencia contable, fiscal y financiera para crear soluciones integrales. Garantizamos tu tranquilidad fiscal, financiera y empresarial" />
@stop

@section('body_class')
    class="blog result-list"
@stop

@section('view')

 	<input type="hidden" name="page" value="1" class="page" />
 	<input type="hidden" name="q" value="{{ Input::get('q') }}" class="search"/>
 	<input type="hidden" name="_token" value="{{ csrf_token() }}" class="token" />
	
    <section class="results-blog">
		<form id="form-search" name="form-search" action="" method="GET">
        <div class="row align-top">
         	
        	<div class="columns small-12 medium-6">
        		<p class="aside-title">Búsqueda General</p>
               
                <div class="search-block flex align-middle">
                    <div class="input-custom">
                        <input type="text" name="q" id="q" value="{{ Input::get('q') }}" />
                    </div>
                    <!--<button type="submit" class="go-search"><i class="icon-search"></i></button>-->

                    <div class="button-search">
                        <input type="submit" value="Buscar" class="btn-border">
                    </div>
                </div>
            </div>
            <div class="columns small-12 medium-6 flex align-right">
               
            	<p class="aside-title"><span class="show-for-large">Filtrar por</span> categorías:</p>
                <div class="select-custom">
                	<select name="categories[]" id="categories" placeholder="Selecciona">
                		<option value="">Todas</option>
                		
                		@foreach($categories as $category)
                			<?php $selected = ""; ?>
                			@if( count( Input::get('categories') ) > 0 )
                				@if( implode( Input::get('categories'), ',' )  == $category->id )
                					<?php $selected = "selected"; ?>
                				@endif
                			@endif

                			<option value="{{$category->id}}" {{ $selected }}>
                				{{$category->name}}
                			</option>
                		 @endforeach
                	</select>
                </div>
        	</div>
        	
        </div>
        </form>

        <div class="row list-post">
    	  	@if(count($posts) > 0)

            	@include('front.elements.post-list')
	        @else
	        	<div class="small-12">
	            	<p class="no-results"><stron>No se encontraron resultados.</stron></p>
	            </div>
	        @endif
        </div>

        <div class="row">
        	<div class="small-12 text-center">

	        	@if($pagination['hasMorePages'])
	        		<hr />
			        <a class="link-gray more-post">Ver más</a>
			    @endif

			    <div class="loading">
			    	<div class="spinner">
			    		<div class="dot1"></div>
			    		<div class="dot2"></div>
			    	</div>
			    </div>
		    </div>
        </div>

    </section> 

@stop