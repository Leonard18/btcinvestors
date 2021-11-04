@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="Edit Post - {{ config('app.name') }}">
   		<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
	<script type="text/javascript">
  	tinymce.init({
    	selector: '#texteditor'
    });
	tinymce.init({
  selector: '#texteditor',
  //language: 'sv',
  //language_url: '/js/sv.js',
  //plugins: 'myplugin',
	height: 500,
          // plugins: 'link code'
          plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help imagetools'
          ],
          toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | help | image',
          menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
          },
          menubar: 'favs file edit view insert format tools table help',
          content_css: 'css/content.css',

           menubar: true,
           toolbar: true,
});
</script>
    <title>{{ config('app.name') }} - Update Post</title>
@endsection

@section('page-name')
    Update Post
    @section('small-page-name', 'update-post')
@endsection

@section('content')

<div class="my-5">

    <div class="container-fluid p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header pb-4 center">
            <div class="row">
                <div class="col s10 l10">
                    <h1 class="section-header-text" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Update Post</h1>
                </div>
                <div class="col s2 l2 pt-4">
                    <a class="btn btn-small grey darken-2 white-text" href="{{ route('post.index') }}">Cancel</a>
                    <a onclick="event.preventDefault(); if(confirm('Are you sure?')){ document.getElementById('delete-post-{{ $post->slug }}-{{ $post->id }}').submit() }" class="btn btn-small red white-text">DELETE</a>
                    <form id="delete-post-{{ $post->slug }}-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none !important;">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>
            </div>
        </div>

        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf()
            @method('PUT')
                <div class="row mt-30">
                    {{-- first part --}}
                    <div class="col s12 l11">
                        <div class="input-field col s12 l10">
                            <input type="text" name="title" id="title" class="validate @error('title') error-red @enderror " value="{{ $post->title }}">
                            <label for="title">Post Title</label>
                            @error('title')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col s12 l12">
                            <input type="text" name="slug" id="slug" class="validate @error('slug') error-red @enderror" value="{{ $post->slug }}">
                            <label for="slug">Post Slug</label>
                            @error('slug')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-field col s12 l12">
                           <select name="category_id" id="category_id" class="validated @error('category_id') error-red @enderror">
                            <option value="{{ $post->category_id }}" selected>{{ $post->category->name }}</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                           </select>
                            <label for="category_id">Select Category</label>
                            @error('category_id')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    {{-- end of first part --}}

                    {{-- second part --}}
                    <div class="col s12 l1 offest-l1">
                        <div class="input-field col s12 l12">
                            <input type="file" name="image" id="image">
                            @error('image')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col s12 l12">
                            <select name="tags[]" id="tags" multiple>
                               @foreach ($tags as $tag)
                                   <option value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? "selected" : "" }}>{{ $tag->name }}</option>
                               @endforeach
                            </select>
                             <label for="category_id">Select Tags</label>
                         </div>
                        <button type="submit" class="btn btn-block green white-text">UPDATE POST</button>
                        <button type="reset" class="btn btn-block grey white-text">RESET</button>

                    </div>
                    {{-- end of second part --}}
                </div>

          <div class="input-field col s12 l12">
            <textarea id="texteditor" name="body" class="materialize-textarea @error('body') error-red @enderror">{{ strip_tags($post->body) }}</textarea>
            <label for="textarea1">Post body</label>
            @error('body')
            <span class="red-text">{{ $message }}</span>
        @enderror
          </div>
        </form>

        </div>
    </div>




@endsection

@section('footerContent')
<script>
    $("#tags").select2();

    // $("#post-form").parsley();

</script>
@endsection
