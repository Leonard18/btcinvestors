@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Account settings">
    <title>{{ config('app.name') }} - Account Settings</title>
@endsection

@section('page-name')
    Account Settings
    @section('small-page-name', 'account-settings')
@endsection

@section('content')

    {{-- Update country section --}}
    <div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

        <div class="container-fluid p-5 rounded">
            <div class="row">
                <div class="col-md-5" style="background: {{ env('') }} !important;">
                    <h4>Your Country</h4>
                    <p class="grey-text">Update your account country info.</p>
                </div>
                <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                    <form action="{{ route('country.update') }}" method="POST" id="country">
                        @csrf
                      <div class="input-field col s12 l12 m12">
                        <input type="text" name="country" id="country" class="validate" value="{{ auth()->user()->country }}">
                        <label for="country">Country</label>
                      </div>
                      
                      <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                          <button class="btn btn-block black white-text">UPDATE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    {{-- Update country section --}}
    
    {{-- Update state section --}}
    <div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

        <div class="container-fluid p-5 rounded">
            <div class="row">
                <div class="col-md-5" style="background: {{ env('') }} !important;">
                    <h4>Your State</h4>
                    <p class="grey-text">Update your account state info.</p>
                </div>
                <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                    <form action="{{ route('state.update') }}" method="POST" id="state">
                        @csrf
                      <div class="input-field col s12 l12 m12">
                        <input type="text" name="state" id="state" class="validate" value="{{ auth()->user()->state }}">
                        <label for="state">State</label>
                      </div>
                      
                      <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                          <button class="btn btn-block black white-text">UPDATE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    {{-- Update state section --}}

    {{-- Update city section --}}
    <div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

        <div class="container-fluid p-5 rounded">
            <div class="row">
                <div class="col-md-5" style="background: {{ env('') }} !important;">
                    <h4>Your City</h4>
                    <p class="grey-text">Update your account city info.</p>
                </div>
                <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                    <form action="{{ route('city.update') }}" method="POST" id="city">
                        @csrf
                      <div class="input-field col s12 l12 m12">
                        <input type="text" name="city" id="city" class="validate" value="{{ auth()->user()->city }}">
                        <label for="city">City</label>
                      </div>
                      
                      <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                          <button class="btn btn-block black white-text">UPDATE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    {{-- Update city section --}}

    {{-- Update zip code section --}}
    <div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

        <div class="container-fluid p-5 rounded">
            <div class="row">
                <div class="col-md-5" style="background: {{ env('') }} !important;">
                    <h4>Your Zip Code</h4>
                    <p class="grey-text">Update your account zip code info.</p>
                </div>
                <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                    <form action="{{ route('zipcode.update') }}" method="POST" id="zipcode">
                        @csrf
                      <div class="input-field col s12 l12 m12">
                        <input type="text" name="zip_code" id="zip_code" class="validate" value="{{ auth()->user()->zip_code }}">
                        <label for="zip_code">Zip code</label>
                      </div>
                      
                      <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                          <button class="btn btn-block black white-text">UPDATE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    {{-- Update zip code section --}}

    {{-- Update home address section --}}
    <div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

        <div class="container-fluid p-5 rounded">
            <div class="row">
                <div class="col-md-5" style="background: {{ env('') }} !important;">
                    <h4>Your Home Address</h4>
                    <p class="grey-text">Update your account home address info.</p>
                </div>
                <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                    <form action="{{ route('home-address.update') }}" method="POST" id="home_address">
                        @csrf
                      <div class="input-field col s12 l12 m12">
                        <input type="text" name="home_address" id="home_address" class="validate" value="{{ auth()->user()->home_address }}">
                        <label for="home_address">Home address</label>
                      </div>
                      
                      <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                          <button class="btn btn-block black white-text">UPDATE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    {{-- Update home address section --}}

    {{-- Update wallet address section --}}
    <div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

        <div class="container-fluid p-5 rounded">
            <div class="row">
                <div class="col-md-5" style="background: {{ env('') }} !important;">
                    <h4>Your Wallet Address</h4>
                    <p class="grey-text">Update your account wallet address info.</p>
                </div>
                <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                    <form action="{{ route('wallet-address.update') }}" method="POST" id="wallet_address">
                        @csrf
                      <div class="input-field col s12 l12 m12">
                        <input type="text" name="wallet_address" id="wallet_address" class="validate" value="{{ auth()->user()->wallet_address }}">
                        <label for="wallet_address">Wallet address</label>
                      </div>
                      
                      <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                          <button class="btn btn-block black white-text">UPDATE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    {{-- Update wallet address section --}}
    
    




@endsection

@section('footerContent')

@endsection
