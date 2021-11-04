@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Reset Password - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Reset Password</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Reset Password
    {{-- @section('small-page-name', 'reset-password') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">

        <div class="rounded-md p-4 login-form-section container" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">
            <div class="row justify-content-center center">
                <div class="col-md-6">
                    <div class="py-3">
                        <h4>Reset Password</h4>
                        <p>Enter a new and a secured password for your account</p>
                    </div>
                 <form action="{{ route('password.update') }}" method="POST" class="pt-3">
                     @csrf
                     <input type="hidden" name="token" value="{{ $request->route('token') }}">
                     <div class="form-group">
                       <input type="text" name="email" id="email" class="form-control rounded black-text pl-3 border-white @error('email') border-red @enderror" value="{{ $request->email }}" style="width: 96% !important; border: 1px solid darkgray !important;" readonly>
                       @error('email')
                           <span class="red-text">{{ $message }}</span>
                       @enderror
                     </div>
                     <div class="form-group">
                       <input type="password" name="password" id="password" class="form-control rounded black-text pl-3 border-white @error('password') border-red @enderror" placeholder="Password" style="width: 96% !important; border: 1px solid darkgray !important;">
                     </div>
                     <div class="form-group">
                       <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded black-text pl-3 border-white @error('password') border-red @enderror" placeholder="Confirm password" style="width: 96% !important; border: 1px solid darkgray !important;">
                     </div>
                     {{-- button section --}}
                     <button type="submit" class="btn btn-block font-weight-bolder btn-large bg-white hover:bg-blue-100" role="button" style="background: {{ env('APP_WHITE_COLOR') }} !important; color: {{ env('APP_PRIMARY_COLOR') }} !important; width: 100% !important;">Update password</button>
                 </form>
                </div>
            </div>
         </div>
       
    </section>
    
@endsection

@section('footerContent')
    
@endsection