@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Referral Link">
    <title>{{ config('app.name') }} - Referral Link</title>
@endsection

@section('page-name')
    Referral Link
    @section('small-page-name', 'referral-link')
@endsection

@section('content')

   {{-- Deposits section --}}
   <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Referral Link </h3>

        <p>Earn extra up to NGN200K monthly commission by sharing your referral link across your social media channels.</p>
        <p>Share it to your friends, family, and well wishers to gain more traction to your profile and earn more in return. Guide them through the registration process and happily ash out in the end.</p>

        <div class="container green white-text center p-3 rounded my-4">
            <h3>{{ auth()->user()->referral_link }}</h3>
        </div>

        <div class="container mt-5 grey-text text-darken-1">
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

</div>

@endsection

@section('footerContent')

@endsection
