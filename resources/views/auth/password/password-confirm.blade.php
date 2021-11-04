@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Confirm Password - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Confirm Password</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Confirm Password
    {{-- @section('small-page-name', 'about us') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">

        <div class="rounded-md p-4 login-form-section container" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">
            <div class="row justify-content-center center">
                <div class="col-md-6">
                    <div class="py-3">
                        <h4>Confirm Password</h4>
                        <p>Confirm your password to continue.</p>
                    </div>
                    {{-- status section --}}

                        @if (session('status'))
                            <div class="py-1">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                 {{ session('status') }}
                                </div>
                            </div>
                        @endif
                    {{-- end of status section --}}
                 <form action="{{ url('user/confirm-password') }}" method="POST" class="pt-3">
                     @csrf
                     <div class="form-group">
                       <input type="password" name="password" id="password" class="form-control rounded black-text pl-3 border-white @error('password') border-red @enderror" placeholder="Confirm password" style="width: 96% !important; border: 1px solid darkgray !important;">
                       @error('password')
                           <span class="red-text">{{ $message }}</span>
                       @enderror
                     </div>
                     {{-- button section --}}
                     <button type="submit" class="btn btn-block font-weight-bolder btn-large bg-white hover:bg-blue-100" role="button" style="background: {{ env('APP_WHITE_COLOR') }} !important; color: {{ env('APP_PRIMARY_COLOR') }} !important; width: 100% !important;">Confirm password</button>
                 </form>
                </div>
            </div>
         </div>

    </section>

@endsection

@section('footerContent')

@endsection
