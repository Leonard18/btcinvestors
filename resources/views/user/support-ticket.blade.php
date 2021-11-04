@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Support Center">
    <title>{{ config('app.name') }} - Support Center</title>
@endsection

@section('page-name')
    Support Center
    @section('small-page-name', 'support-center')
@endsection

@section('content')

   <x-contact-form />
   <x-contact-details />

@endsection

@section('footerContent')

@endsection
