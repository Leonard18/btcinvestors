@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="All Posts - {{ config('app.name') }}">
    <title>{{ config('app.name') }} - Dashboard All Posts</title>
@endsection

@section('page-name')
    All Posts
    @section('small-page-name', 'posts')
@endsection

@section('content')

<div class="my-5">

    <div class="container-fluid p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header pb-4 center">
            <div class="row">
                <div class="col s10 l10">
                    <h1 class="section-header-text underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">All Posts</h1>
                </div>
                <div class="col s2 l2 pt-4">

                    <!-- Modal Trigger -->
                    <a class="btn green darken-2 white-text" href="{{ route('post.create') }}">Add New Post</a>
                </div>
            </div>
        </div>
        <div class="row">
            <table>
                <thead class="blue darken-3 white-text">
                    <tr>
                        <th data-field="id">#</th>
                        <th data-field="title">Title</th>
                        <th data-field="slug">Slug</th>
                        <th data-field="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-small blue darken-2 white-text">VIEW</a>

                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-small green darken-2 white-text">EDIT</a>

                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-post-{{ $post->slug }}-{{ $post->id }}').submit() }" class="btn btn-small red white-text">DELETE</a>

                                <form id="delete-post-{{ $post->slug }}-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none !important;">
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
        </div>
    </div>




@endsection

@section('footerContent')

@endsection
