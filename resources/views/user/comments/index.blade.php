@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="Comment - {{ config('app.name') }}">
    <title>{{ config('app.name') }} - Comments</title>
@endsection

@section('page-name')
    Coomments
    @section('small-page-name', 'comments')
@endsection

@section('content')

    {{-- Account section --}}
     <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Comments</h3>
        </div>


        <div class="row">
            {{-- table section --}}
            <div class="col s12 l12">

               <div>
                   <div class="section-header">
                       <h2 class="pb-4 underline grey-text">All Comments</h2>
                   </div>
                   {{-- Comment table --}}
                   <table>
                       <thead>
                           <tr>
                               <th data-field="id">#</th>
                               <th data-field="name">Name</th>
                               <th data-field="comment">Comment</th>
                               <th data-field="post-title">Post Title</th>
                               <th data-field="action">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($comments as $comment)
                            <tr>
                                {{-- Loop count --}}
                                <td>{{ $loop->iteration }}</td>

                                {{-- comment name --}}
                                <td><a href="{{ route('comment.edit', $comment->id) }}">{{ $comment->name }}</a></td>

                                {{-- main comment body --}}
                                {{-- <td>{{ Str::substr($comment->comment, 0, 30) }} {{ Str::length($comment->comment) > 30 ? "..." : "" }}</td> --}}
				                <td>{{ $comment->comment }} </td>

                                {{-- comment post --}}
                                <td>{{ $comment->post->title }}</td>

                                {{-- comment action --}}
                                <td>

                                     <!-- Modal Trigger -->
                                    <a class="waves-effect waves-light btn blue white-text darken-3 modal-trigger" href="#modal-{{ $comment->name }}-{{ $comment->id }}">EDIT</a>

                                    <!-- Modal Structure -->
                                    <div id="modal-{{ $comment->name }}-{{ $comment->id }}" class="modal modal-fixed-footer">
                                      <div class="modal-content">
                                        <h4>Edit {{ $comment->name }} Comment</h4>

                                        <div class="my-3">
                                            <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                              <div class="input-field col s12 l8 offset-l2">
                                                <input type="text" name="name" value="{{ $comment->name }}" id="name" class="validate rounded border">
                                                <label for="name">Name</label>
                                              </div>
                                              <div class="input-field col s12 l8 offset-l2">
                                                <input type="email" name="email" value="{{ $comment->email }}" id="email" class="validate rounded border">
                                                <label for="email">Email</label>
                                              </div>
                                              <div class="input-field col s12 l8 offset-l2">
                                                    <textarea id="comment" name="comment" class="materialize-textarea">{{ $comment->comment }}</textarea>
                                                <label for="comment">Comment</label>
                                              </div>

                                              <button type="submit" class="btn btn-large blue darken-3 white-text">Update Comment</button>
                                        </div>

                                      </div>
                                      <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text">Close</a>
                                      </div>
                                    </form>
                                    </div>

                                    <a class="btn red white-text btn-small" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $comment->name }}-{{ $comment->id }}').submit() } ">DELETE</a>

                                    <form id="delete-form-{{ $comment->name }}-{{ $comment->id }}" action="{{ route('comment.destroy', $comment->id) }}" method="post" style="display: none !important;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </td>



                                </td>
                            </tr>
                           @empty
                                <tr>
                                    <td colspan="5">There are no comments on any post.</td>
                                </tr>
                           @endforelse
                       </tbody>
                   </table>
               </div>
               {{-- End of table section --}}
            </div>
        </div>
    </div>

</div>

@endsection

@section('footerContent')

@endsection
