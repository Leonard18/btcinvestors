<div>
   
    <section class="user-page-header" style="background: {{ env('APP_PRIMARY_COLOR') }} !important;" class="py-4 mb-5">
        <div class="container">
            <h2 class="py-2" style="color: {{ env('APP_WHITE_COLOR') }} !important;">@yield('page-name')</h2>
            <p style="font-size: 17px !important;"><a href="{{ route('dashboard') }}" class="grey-text" style="color: {{ env('APP_WHITE_COLOR') }} ">Dashboard</a> <i class="fa fa-chevron-right ml-2 mr-2" aria-hidden="true" style="font-size: 14px !important; color: {{ env('APP_WHITE_COLOR') }}"></i> <span class="font-semibold" style="color: {{ env('APP_GREY_HEADER_COLOR') }}">@yield('small-page-name')</span></p>
        </div>
    </section>

</div>