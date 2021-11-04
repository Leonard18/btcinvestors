@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Profile">
    <title>{{ config('app.name') }} - Profile</title>
@endsection

@section('page-name')
    Profile
    @section('small-page-name', 'profile')
@endsection

@section('content')

<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

        {{-- user profile details section --}}
        <div>

            <div class="container-fluid rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                <ul class="collection with-header">
        
                    <li class="collection-header">
                      <h1>Your Profile Info</h1>
                    </li>
                    <li class="collection-item"><div>Full Name <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->first_name ?? null }} {{ auth()->user()->last_name ?? null }}</span></div></li>
        
                    <li class="collection-item"><div>Email <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->email }}</span></div></li>
                    
                    <li class="collection-item"><div>Phone <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->phone }}</span></div></li>
                    
                    <li class="collection-item"><div>Regtistration Date <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->created_at->diffForHumans() }}</span></div></li>
        
                    <li class="collection-item"><div>Referral Link <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->referral_link }}</span></div></li>

                    <li class="collection-item"><div>Referral Count <span class="secondary-content" style="font-weight: bolder !important;">{{ Auth::user()->referrals->count() }}</span></div></li>
                    
                    <li class="collection-item"><div>Your Referral <span class="secondary-content" style="font-weight: bolder !important;">{{ Auth::user()->referrer->name ?? "Not referred" }}</span></div></li>
        
                    <li class="collection-item"><div>Account Status <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->email_verified_at ? 'Verified' : 'Not verified' }}</span></div></li>
        
                  </ul>
            </div>
        
        </div>
        
    </div>

@endsection

@section('footerContent')

@endsection
