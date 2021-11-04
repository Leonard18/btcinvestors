@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Contact Us - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Contact Us</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Contact Us
    {{-- @section('small-page-name', 'contact us') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="container">
       <x-contact-details />
    </section>
    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="container">
       <x-contact-form />
    </section>
    
@endsection

@section('footerContent')
    
@endsection