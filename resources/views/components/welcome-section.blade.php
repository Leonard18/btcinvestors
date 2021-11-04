<div class="my-5">

    <section class="container" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="row">
            <div class="col-md-7 p-5">
                <h2 class="pb-2">Welcome to <strong style="color: {{ env('APP_PRIMARY_COLOR') }}">{{ config('app.name') }}</strong></h2>
                <p>We trade and manage investments. We are known for our expertise and longevity in business. We deliver great results and pay our investors when due. Trading success to see that our investors are financially independent is our priority and identity.</p>
                <p>We are trusted by many investors across the world and we deliver great results. Our future goal is to make our investors live the life of their dreams of financial freedom. Learn more <a href="{{ route('about') }}">here</a></p>

            </div>
            <div class="col-md-4 offset-md-1 p-5">
                <img src="{{ asset('img/slide3.jpeg') }}" class="responsive-img" alt="image">
            </div>
        </div>
    </section>

</div>
