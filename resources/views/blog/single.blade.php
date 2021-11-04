@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="{{ config('app.name') }} - {{ $post->title }}">
   <title>{{ config('app.name') }} - {{ $post->title }}</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    <a href="{{ route('blog.index') }}" class="grey-text"><i class="fas fa-chevron-left" aria-hidden="true"></i></a> {{ $post->title }}
    {{-- @section('small-page-name', '') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container rounded">
        <h2>{{ $post->title }}</h2>
        <div class="my-4 p-5 grey lighten-5 rounded">
            {{-- Post section div --}}
            <div class="row">
                <div class="col s12 l6">Author: <strong>{{ $post->author }}</strong></div>
                <div class="col s12 l6">Posted on: <strong>{{ $post->created_at->diffForHumans() }}</strong></div>
            </div>
            <div class="row">
                <div class="col s12 l6">Tags: @foreach ($post->tags as $tag)
                    <span class="black grey-text p-1 rounded m-1">{{ Str::ucfirst($tag->name) }}</span>
                @endforeach</div>
                <div class="col s12 l6">Category: <strong>{{ $post->category->name }}</strong></div>
            </div>
            <div class="row">
                <div class="col s12 l12">Current URL: <a href="{{ route('blog.single', Str::lower($post->slug)) }}"><strong>{{ 'http://'. config('app.name') . '/blog' . '/' . Str::lower($post->slug)  }}</strong></a></div>
            </div>
            {{-- End of Post section div --}}

    </div>


    <div class="container rounded">
         {{-- Post image --}}
         @if ($post->image)
            <div class="my-3">
                <img src="{{ asset('storage/postimages'.$post->image) }}" alt="" class="responsive-img" style="width: 100% !important; height: 400px !important;">
            </div>
        @endif

        {{-- Post body --}}
        @if ($post->body)
            <div class="p-5 ">
                <p>{{ strip_tags($post->body) }}</p>
            </div>
         @endif


         {{-- check for post comments --}}
         @if ($post->comments->count() > 0)
            <h3 class="underline">Comments</h3>
             <div class="grey lighten-5 py-2 container">
                @foreach ($post->comments as $comment)
                    <div class="white p-4 rounded my-3">
                        <p class="ml-30"><i class="fa fa-user-circle grey-text mr-3" aria-hidden="true"></i><span class="font-bold">{{ $comment->name }}</span></p>
                        <p class="ml-30"><i class="fa fa-clock grey-text mr-3" aria-hidden="true"></i><span>{{ $comment->created_at->diffForHumans() }}</span></p>

                        {{-- main comment section --}}
                        <p>{{ $comment->comment }}</p>
                        {{-- end of main comment section --}}
                    </div>
                @endforeach
             </div>
         @endif
         {{-- check for post comments --}}

        
    </div>

    <hr>

    {{-- Add comment section --}}
    <div class="white my-5 container">
        <h3 class="underline">Add a Comment</h3>
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <div class="input-field col s12">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
          </div>
          <div class="input-field col s12">
            <input type="text" name="name" id="name" class="validate @error('name') error-red  @enderror">
            <label for="name">Full Name</label>
	         @error('name')
			<span class="red-text">{{ $message }}</span>
		@enderror
          </div>
          <div class="input-field col s12">
            <input type="email" name="email" id="email" class="validate @error('email') error-red  @enderror">
            <label for="email" data-error="wrong" data-success="right">Email</label>
		@error('email')
			<span class="red-text">{{ $message }}</span>
		@enderror
          </div>
          <div class="input-field col s12 l12">
            <textarea id="comment" name="comment" class="materialize-textarea @error('comment') error-red  @enderror"></textarea>
            <label for="comment">Comment</label>
		@error('email')
			<span class="red-text">{{ $message }}</span>
		@enderror
          </div>

          <button type="submit" class="btn btn-large blue darken-3 white-text">Add Comment</button>

        </form>
    </div>
    {{-- End of Add comment section --}}

    </section>
    
@endsection

@section('footerContent')
    
@endsection