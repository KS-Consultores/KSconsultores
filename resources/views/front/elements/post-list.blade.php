<?php
/**
 * Created by PhpStorm.
 * User: Sarahi
 * Date: 27/10/15
 * Time: 16:17
 */?>


@foreach($posts as $post)
    <div class="small-12 medium-6 large-4">
        <article class="post">
            <a href="/post/{{ $post->id }}/{{Str::slug($post->title)}}" class="post-image">
                <img class="img-responsive" src="/multimedia/posts/{{ $post->id }}/sm-{{ $post->image }}" alt="{{ $post->title }}" />
            </a>
            <div class="post-title">
                <a href="/post/{{ $post->id }}/{{Str::slug($post->title)}}">
                    {!! str_limit($post->title, 45) !!}
                </a>
            </div>
            <div class="post-date">
                {{ Date::parse($post->created_at)->format('d \d\e F, Y') }}
            </div>
            <div class="post-description">
                <p>
                    {!! str_limit($post->description, 120, '[...]') !!}
                </p>
            </div>
        </article>
    </div>
@endforeach

