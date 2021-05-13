@extends('front.layout.base')

@section('meta_page')
<title>KS Consultores | {{ $post->title }}</title>
<meta content="{{ $post->description }}" name="description"/>

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="KS Consultores">
<meta itemprop="description" content="{{ $post->description }}">
<meta itemprop="image" content="{{ asset('front/img/banner-home.jpg') }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $post->title }}" /> 
<meta property="og:image" content="/multimedia/posts/{{ $post->id }}/{{ $post->image }}" />
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="{{ $post->description }}" />
@stop

@section('body_class')
    class="detail-blog"
@stop

@section('view')
    <section class="detail">
        <div class="row">
            <div class="small-12">
                <div class="post-detail">

                    <h1 class="post-detail-title">{{ $post->title }}</h1>
                    <p class="post-detail-date">{{ Date::parse($post->created_at)->format('d \d\e F, Y') }}</p>

                    <div class="post-detail-image">
                        <img src="/multimedia/posts/{{ $post->id }}/{{ $post->image }}" alt="{{ $post->title }}" class="img-responsive" />
                    </div>

                    <div class="post-detail-content">
                        {!! $post->body !!}
                    </div>
                    <!--<h2 class="post-detail-category">{{ $post->categories[0]->name }}</h2>-->

                    <div class="social-share flex align-middle">

                        <p>Compartir: </p>
                        <ul class="list-social-share rrssb-buttons flex align-middle">
                            <li class="rrssb-facebook">
                                <a class="flex align-middle align-center popup" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('/post') }}/{{$post->id}}/{{ Str::slug($post->title)}}"><i class="icon-facebook"></i></a>
                            </li>
                            <li class="rrssb-twitter">
                                <a class="flex align-middle align-center popup" target="_blank" href="https://twitter.com/home?status={{ URL::to('/post') }}/{{$post->id}}/{{ Str::slug($post->title)}}"><i class="icon-twitter"></i></a>
                            </li>
                            <li class="rrssb-linkedin">
                                <a class="flex align-middle align-center popup" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ URL::to('/post') }}/{{$post->id}}/{{ Str::slug($post->title)}}&title={{ $post->title }}&summary={{ $post->description }}&source="><i class="icon-linkedin2"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
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

        <div class="row">
            <div class="small-12">
                <div class="other-categories">

                    <p class="aside-title">Otros artículos:</p>

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
                </div>
            </div>
        </div>

        <div class="row nav-detail">
            <div class="small-6">
                <a class="link-gray" onclick="window.history.back()"><i class="icon-arrow-back"></i> Regresar</a>
            </div>
            <div class="small-6 text-right">
                <a class="link-gray" href="{{route('results')}}">Ver todos <i class="icon-arrow-next2"></i></a>
            </div>
        </div>

    </section>

@stop
