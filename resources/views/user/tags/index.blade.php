@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="Tags - {{ config('app.name') }}">
    <title>{{ config('app.name') }} - Tags</title>
@endsection

@section('page-name')
    Tag
    @section('small-page-name', 'tags')
@endsection

@section('content')

    {{-- Account section --}}
     <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Tag</h3>
        </div>


        <div class="row">
            {{-- table section --}}
            <div class="col s12 l7">

               <div>
                   <div class="section-header">
                       <h2 class="pb-4 underline grey-text">All Tags</h2>
                   </div>
                   {{-- Tag table --}}
                   <table>
                       <thead>
                           <tr>
                               <th data-field="id">#</th>
                               <th data-field="name">Name</th>
                               <th data-field="action"></th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td><a href="{{ route('tag.edit', $tag->id) }}">{{ $tag->name }}</a></td>
                                <td>

                                    <!-- Modal Trigger -->
                                    <a class="waves-effect waves-light btn blue white-text darken-3 modal-trigger" href="#modal-{{ $tag->name }}-{{ $tag->id }}">EDIT</a>

                                    <!-- Modal Structure -->
                                    <div id="modal-{{ $tag->name }}-{{ $tag->id }}" class="modal modal-fixed-footer">
                                      <div class="modal-content">
                                        <h4>Edit {{ $tag->name }} Tag</h4>

                                        <div class="my-3">
                                            <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                              <div class="input-field col s12 l8 offset-l2">
                                                <input type="text" name="name" value="{{ $tag->name }}" id="name" class="validate rounded border">
                                                <label for="name">Tag name</label>
                                              </div>

                                              <div class="input-field col s12 l8 offset-l2">
                                                <button type="submit" class="btn btn-block blue darken-3 white-text">Update Tag</button>
                                              </div>

                                        </div>

                                      </div>
                                      <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat grey-text">Close</a>
                                      </div>
                                    </form>
                                    </div>

                                    <a class="btn red white-text btn-small" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $tag->name }}-{{ $tag->id }}').submit() } ">DELETE</a>

                                    <form id="delete-form-{{ $tag->name }}-{{ $tag->id }}" action="{{ route('tag.destroy', $tag->id) }}" method="post" style="display: none !important;">
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
               {{-- End of table section --}}
            </div>
            {{-- form section --}}
            <div class="col s12 l4 offset-l1 my-5">
               <div>
                   <div class="section-header">
                       <h4 class="pb-4  grey-text"">Add New Tag</h4>
                   </div>
                  <form action="{{ route('tag.store') }}" method="POST">
                      @csrf
                    <div class="input-field col s12 l12">
                      <input type="text" name="name" id="name" class="validate rounded border">
                      <label for="name">Tag name</label>
                    </div>

                    <div class="input-field col s12 l12">
                      <button type="submit" class="btn btn-block blue darken-3 white-text">Add Tag</button>
                    </div>
                  </form>
               </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('footerContent')

@endsection
