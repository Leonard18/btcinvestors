@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Register - {{ config('app.name') }}">
   <title>{{ config('app.name') }}- Register</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Register
    {{-- @section('small-page-name', 'register') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">
       <div class="row">
           <div class="col-md-4 my-3 p-4">
               <h3 class="pb-2">Create Account</h3>
               <p>Create account by filling all form fields. <span class="red-text font-bold">ALL FIELDS ARE REQUIRED.</span></p>
               <p>Make sure you're on the right URL <button class="btn rounded" disabled><strong class="black-text">{{ route('register') }} </strong></button> before proceeding with the registration process.</p>
           </div>
           <div class="col-md-7 offset-md-1">
               <x-register-form />
           </div>
       </div>
    </section>

@endsection

@section('footerContent')

@endsection
