@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Forgot Password - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Forgot Password</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Forgot Password
    {{-- @section('small-page-name', 'forgot-password') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">

        <div class="rounded-md p-4 login-form-section container" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">
            <div class="row justify-content-center center">
                <div class="col-md-6">
                    <div class="py-3">
                        <h4>Forgot Password</h4>
                        <p>Enter the email address associated with your account. A password reset link will be sent to your email to enable you reset your account password.</p>
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
                 <form action="{{ route('password.request') }}" method="POST" class="pt-3">
                     @csrf
                     <div class="form-group">
                       <input type="text" name="email" id="email" class="form-control rounded black-text pl-3 border-white @error('email') border-red @enderror" placeholder="Email" value="{{ old('email') }}" style="width: 96% !important; border: 1px solid darkgray !important;">
                       @error('email')
                           <span class="red-text">{{ $message }}</span>
                       @enderror
                     </div>
                     {{-- button section --}}
                     <button type="submit" class="btn btn-block font-weight-bolder btn-large bg-white hover:bg-blue-100" role="button" style="background: {{ env('APP_WHITE_COLOR') }} !important; color: {{ env('APP_PRIMARY_COLOR') }} !important; width: 100% !important;">Reset password</button>
                 </form>
                </div>
            </div>
         </div>
       
    </section>
    
@endsection

@section('footerContent')
    
@endsection