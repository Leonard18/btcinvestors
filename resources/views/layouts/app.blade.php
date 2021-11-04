<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('headerContent')
    @livewireStyles
</head>
<body style="background: {{ env('APP_BODY_COLOR') }} !important;">

    <x-user-navigation />

    <x-user-page-header />
    <main>

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Success!  </strong> {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Error!  </strong> {{ Session::get('error') }}
            </div>
        @endif
        
        @yield('content')


        {{-- Account security tip section --}}
        {{-- <x-security-tip /> --}}
        {{-- footer section --}}
        <x-user-footer />
    </main>

    

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/user.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('footerContent')

    @livewireScripts

     {{-- add jquery to toggle class for the user dropdown --}}
     <script>
        $(document).ready(function(){
            $('#userDrop').click(function() {
                $('#userContent').toggleClass('show');
            });
        });
    </script>
</body>
</html>
