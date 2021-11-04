@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Login - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Login</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Login
    {{-- @section('small-page-name', 'login') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">
       <div class="row">
           <div class="col-md-5 my-3 p-5">
               <h3 class="pb-2">Access Your Account</h3>
               <p>Login to access your account profile.</p>
               <p>Make sure you're on the right URL <button class="btn rounded" disabled><strong class="black-text">{{ route('login') }} </strong></button> before entering your login details.</p>
           </div>
           <div class="col-md-6 offset-md-1">
               <x-login-form />
           </div>
       </div>
    </section>

@endsection

@section('footerContent')

@endsection
