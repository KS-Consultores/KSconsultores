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
    class="blog"
@stop

@section('view')


<section class="banner-intro img-cover flex align-middle align-center" style="background-image: url('{{ asset('front/img/banner-blog.jpg') }}')">
    <div class="banner-intro-info">
        <h1 class="banner-intro-title">KS CONSULTORES</h1>
        <h2 class="banner-intro-subtitle">Blog</h2>
    </div>

    <div class="banner-intro-down">
        <a class="btn-custom">Ver Más</a>
        <a class="icon-down"><i class="icon-arrow-next"></i></a>
    </div>
    
</section>

    <section class="index-blog">
        <div class="row">
            <div class="columns small-12 medium-7 large-6 flex align-center order-2">
                <div class="aside-mobile show-for-small-only">
                    <p class="aside-title">Búsqueda General</p>

                    <form id="form-search-mobile" name="form_search_mobile" action="{{route('results')}}" method="GET">
                        <div class="search-block flex align-middle">
                            <div class="input-custom">
                                <input type="text" name="q" id="q" value="{{ Input::get('q') }}" />
                            </div>
                            <!--<button type="submit" class="go-search"><i class="icon-search"></i></button>-->

                            <div class="button-search">
                                <input type="submit" value="Buscar" class="btn-border">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="column-medium">
                    @foreach($populars as $item)
                    <article class="article-popular">
                        <a href="/post/{{ $item->id }}/{{Str::slug($item->title)}}"><img src="/multimedia/posts/{{ $item->id }}/md-{{$item->image}}" /></a>
                        <p class="article-title">
                            <a href="/post/{{ $item->id }}/{{Str::slug($item->title)}}">
                                {{$item->title}}
                            </a>
                        </p>
                        <p class="article-date">{{ Date::parse($item->created_at)->format('\d\e F d, Y') }}</p>
                        <div class="article-text">
                            {!! $item->body !!}<a class="see-more" style="display: block" href="/post/{{ $item->id }}/{{Str::slug($item->title)}}" title="ver más">[...]</a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="columns small-12 medium-5 large-6 flex align-center order-1">
               
                <aside class="aside">
                    <div class="aside-web hide-for-small-only">
                        <p class="aside-title">Búsqueda General</p>

                        <form id="form-search" name="form-search" action="{{route('results')}}" method="GET">
                            <div class="search-block flex align-middle">
                                <div class="input-custom">
                                    <input type="text" name="q" id="q" value="{{ Input::get('q') }}" />
                                </div>
                                <!--<button type="submit" class="go-search"><i class="icon-search"></i></button>-->

                                <div class="button-search">
                                    <input type="submit" value="Buscar" class="btn-border">
                                </div>
                            </div>
                        </form>

                        <hr />
                    </div>

                    <p class="aside-title">Categorías:</p>

                    <div class="aside-categories">
                        <ul>
                            @foreach($categories as $category)
                                <li> 
                                    <a href="{{route('results')}}/?{{ FrontFiller::categoryLink($category->id) }}">
                                        {{$category->name}} 
                                    </a>
                                </li>
                                <li>/</li>
                            @endforeach
                            <li><a href="{{route('results')}}">[Ver todas las categorías...]</a></li>
                        </ul>
                    </div>

                    <hr />
                    

                    <div class="aside-featured-articles">
                        @foreach($outstanding as $article)
                        <article class="featured-article flex align-top">
                            <div class="featured-article-image small-12 large-6">
                                <a href="/post/{{ $article->id }}/{{Str::slug($article->title)}}"><img src="/multimedia/posts/{{ $article->id }}/sm-{{$article->image}}" /></a>
                            </div>
                            <div class="featured-article-content small-12 large-6">
                                <a href="/post/{{ $article->id }}/{{Str::slug($article->title)}}" class="featured-article-title">{{ $article->title }}</a>
                                <p class="featured-article-date">{{ Date::parse($article->created_at)->format('d \d\e F, Y') }}</p>
                                <p>{!! str_limit($article->description, 80, '[...]') !!}</p>
                            </div>
                        </article>
                        @endforeach
                    </div>

                </aside>
            </div>
        </div>
        <div class="row">
            <div class="small-12">
                <hr />
            </div>
        </div>

        <div class="row recent-list">
            <div class="small-12">
                <h5 class="blog-title">Artículos recientes</h5>
            </div>
            <div class="Carousel carousel-recent-articles">
                @foreach($latest as $item)
                <div class="item Carousel-item">
                    <article class="recent-article">
                        <div class="recent-article-image">
                            <a href="/post/{{ $item->id }}/{{Str::slug($item->title)}}"><img src="/multimedia/posts/{{ $item->id }}/sm-{{$item->image}}" /></a>
                        </div>
                        <div class="recent-article-title">
                            <a href="/post/{{ $item->id }}/{{Str::slug($item->title)}}">{!! str_limit($item->title, 45) !!}</a>
                        </div>
                        <div class="recent-article-date">{{ Date::parse($item->created_at)->format('d \d\e F, Y') }}</div>
                        <div class="recent-article-short-description">
                            <p> {!! str_limit($item->description, 120, '[...]') !!}</p>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="small-12">
                <hr />
            </div>
        </div>
        <div class="nav-web">
            <div class="row">
                <div class="small-3 text-left">
                    <a class="link-gray carousel-back"><i class="icon-arrow-back"></i> <span class="hide-for-small-only">Anterior</span></a>
                </div>
                <div class="small-6 text-center">
                    <a href="{{route('results')}}" class="link-gray">
                        <span class="hide-for-small-only">Ver todos los artículos</span>
                        <span class="show-for-small-only">Ver todos</span>
                    </a>
                </div>
                <div class="small-3 text-right">
                    <a class="link-gray carousel-next"><span class="hide-for-small-only">Siguiente</span> <i class="icon-arrow-next2"></i></a>
                </div>
            </div>
        </div>
    </section> 

@stop