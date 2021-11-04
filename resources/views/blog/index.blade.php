@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Blog - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Blog</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Blog
    {{-- @section('small-page-name', 'blog') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section class="rounded my-5 p-5 container" style="background: {{ env('APP_WHITE_COLOR') }}">
        <div class="container">
            <h1 class="grey-text">Recent Posts</h1>
            <hr>

            <div class="row">
                
                @forelse ($posts as $post)
                    <div class="blue-grey darken-1 col-md-4 p-4 rounded" style="border: 2px solid {{ env('APP_BODY_COLOR') }}">
                        @if ($post->image)
                            <div class="post-image mb-3">
                                <img src="{{ asset('storage/postimages'.$post->image) }}" alt="{{ $post->title }}" class="responsive-img">
                            </div>
                        @endif
                        <div class="card-content white-text">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <span class="card-title"></span>
                            <p>{{ strip_tags(Str::substr($post->body, 0, 100)) }} {{ Str::length($post->body) > 100 ? "..." : "" }}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="white-text"><i class="fas fa-comments" aria-hidden="true"></i>  {{ $post->comments->count() }}</span>

                                <span class="ml-2 white-text"><i class="fas fa-clock" aria-hidden="true"></i> {{ $post->created_at->diffForHumans() }}</span>
                            
                            </div>
                            <div class="col-md-6">
                                <a href="/blog/{{ Str::lower($post->slug) }}" class="white btn blue-grey-text">Read more</a>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="blue-grey darken-1 col-md-4 p-4 rounded" style="border: 2px solid {{ env('APP_BODY_COLOR') }}">
                    <div class="card-content white-text">
                        <p>There are no posts yet.</p>
                    </div>
                    <div class="card-action">
                        <a href="{{ route('home') }}">Home</a>
                    </div>
                </div>
                @endforelse
                
            </div>

        </div>
    </section>

@endsection

@section('footerContent')

@endsection
