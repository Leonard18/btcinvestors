<div>

    <section style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;" class="py-2 mb-5">
        <div class="container">
            <h2 class="py-2" style="color: {{ env('APP_TEAL_COLOR') }} !important;">@yield('page-name')</h2>
            {{-- <p style="font-size: 17px !important;"><a href="{{ route('home') }}" class="grey-text">Home</a> <i class="fa fa-chevron-right ml-2 mr-2" aria-hidden="true" style="font-size: 14px !important;"></i></p> --}}
        </div>
    </section>

</div>
