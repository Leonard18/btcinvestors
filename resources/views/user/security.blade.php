@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Security settings">
    <title>{{ config('app.name') }} - Security</title>
@endsection

@section('page-name')
    Account Security
    @section('small-page-name', 'account-security')
@endsection

@section('content')

    <x-user-avatar />
    <x-user-password />
    <x-user-two-factor-authentication />
    <x-user-browser-session />
    <x-user-delete-account />

@endsection

@section('footerContent')

@endsection
