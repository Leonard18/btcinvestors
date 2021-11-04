@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Referrals">
    <title>{{ config('app.name') }} - Referrals</title>
@endsection

@section('page-name')
    Referrals
    @section('small-page-name', 'referrals')
@endsection

@section('content')

   {{-- Deposits section --}}
   <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="row">
            <div class="col s10 l10">
                <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Referrals </h3>
            </div>
            <div class="col s2 l2">
                <h3 class="pb-4 underline green-text">{{ Auth::user()->referrals->count() }} </h3>
            </div>
        </div>
        <p>Referral link - <strong class="green-text">{{ auth()->user()->referral_link }}</strong></p>
        <p>Bag more money up to NGN200K monthly commission by sharing your referral link across your social media channels.</p>

        <div class="container">
            <div class="row">
                @forelse (auth()->user()->referrals as $referral)
                    <div class="col s4 l3 my-10 center">
                        <p><i class="fa fa-user-circle fa-4x grey-text" aria-hidden="true"></i></p>
                        <h5>{{ $referral->username }}</h5>
                    </div>
                @empty
                    <div class="container">
                        <h5 class="red-text">You don't have any referrals yet. Start referring.</h5>
                        <div class="container mt-5 grey-text text-darken-1">
                            <div class="container green white-text center p-3 rounded my-4">
                                <h3>{{ auth()->user()->referral_link }}</h3>
                            </div>
                            <h4>Share your link</h4>
                            <div class="share-icons my-10">
                                <div class="row center">
                                    <div class="col s4 l2 my-2">
                                        <i class="fa fa-share-square fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col s4 l2 my-2">
                                        <i class="fab fa-facebook fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col s4 l2 my-2">
                                        <i class="fab fa-twitter fa-3x" aria-hidden="true"></i>
                                    </div><div class="col s4 l2 my-2">
                                        <i class="fab fa-instagram fa-3x" aria-hidden="true"></i>
                                    </div><div class="col s4 l2 my-2">
                                        <i class="fab fa-linkedin fa-3x" aria-hidden="true"></i>
                                    </div><div class="col s4 l2 my-2">
                                        <i class="fab fa-pinterest fa-3x" aria-hidden="true"></i>
                                    </div><div class="col s4 l2 my-2">
                                        <i class="fab fa-skype fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col s4 l2 my-2">
                                        <i class="fab fa-youtube fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col s4 l2 my-2">
                                        <i class="fab fa-snapchat fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col s4 l2 my-2">
                                        <i class="fab fa-vimeo fa-3x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection

@section('footerContent')

@endsection
