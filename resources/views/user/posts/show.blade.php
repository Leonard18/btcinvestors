@extends('layouts.app')

{{-- <?php $postTitle = $post->title; ?> --}}

@section('headerContent')
    <meta name="description" content="{{ $post->title }} - {{ config('app.name') }}">
    <title>{{ config('app.name') }} - {{ $post->title }}</title>
@endsection

@section('page-name')
    {{ $post->title }}
    {{-- @section('small-page-name',) --}}
@endsection

@section('content')

<div class="my-5">

    <div class="container-fluid p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header pb-4 center">
            <div class="row">
                <div class="col s10 l10">
                    <h2 class="section-header-text" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">{{ $post->title }}</h2>
                    <h4 class="section-header-text" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">{{ Str::lower($post->slug) }}</h4>
                </div>
                <div class="col s2 l2 pt-4">
                    <a class="btn grey darken-2 white-text" href="{{ route('post.index') }}">back</a>
                    <a class="btn blue darken-2 white-text" href="{{ route('post.edit', $post->id) }}">Edit</a>
                </div>
            </div>
        </div>

            <div class="my-4 p-3 grey lighten-5 rounded">

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
                    <div class="col s12 l12">Current URL: <a href="{{ route('blog.single', Str::lower($post->slug)) }}"><strong>{{ route('blog.single', Str::lower($post->slug))  }}</strong></a></div>
                </div>
                {{-- End of Post section div --}}

        </div>

        <div class="grey lighten-5 my-5 rounded p-5">

            {{-- Pos image --}}
            @if ($post->image)
                <div class="my-3">
                   <img src="{{ asset('storage/postimages' . $post->image) }}" alt="" class="responsive-img">
                </div>
            @endif

            {{-- post body section --}}
            @if ($post->body)
                <div class="my-3"> {{ strip_tags($post->body) }}</div>
            @endif
            {{-- end of post body section --}}

            {{-- Post comments setion --}}
            @if ($post->comments->count() > 0)

                <div class="my-5">
                    <h4>Comments</h4>
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th data-field="id">#</th>
                                <th data-field="name">Name</th>
                                <th data-field="name">Comment</th>
                                <th data-field="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse($post->comments as $comment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                       
                                        <a href="{{ route('comment.index') }}" class="btn btn-small blue lighten-2 white-text">EDIT</a> <a onclick="event.preventDefault(); if(confirm('Are you sure?')) {
                                            document.getElementById('delete-comment-{{ $comment->id }}->{{ $post->id }}-{{ $post->slug }}').submit()
                                        }" class="btn btn-small red white-text">DELETE</a>

                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post" style="display: none !important;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                           @empty

                           @endforelse
                        </tbody>
                    </table>
                </div>

            @endif
            {{-- End of Post comments setion --}}
        </div>

    </div>




@endsection

@section('footerContent')

@endsection

