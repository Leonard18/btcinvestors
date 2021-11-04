<div>

    <nav style="background: {{ env('APP_PRIMARY_COLOR') }} !important;">
      <div class="nav-wrapper">
        <div class="container">
          <a href="#" class="brand-logo">BTCInvestor</a>
          <a href="#" data-target="mobile-menu" class="sidenav-trigger hide-on-med-and-up"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
          <ul class="right hide-on-med-and-down">
            <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}" class="{{ Route::is('/') ? 'teal-text' : 'white-text' }}">HOME</a></li>
            <li class="{{ Route::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">ABOUT US</a></li>
            <li class="{{ Route::is('plans') ? 'active' : '' }}"><a href="{{ route('plans') }}">PLANS</a></li>
            @guest
                <li><a href="{{ route('login') }}">LOG IN</a></li>
                <li><a href="{{ route('register') }}">SIGN UP</a></li>
            @endguest
            @auth
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">DASHBOARD</a></li>
                <li class="{{ Route::is('settings') ? 'active' : '' }}"><a href="{{ route('settings') }}">SETTINGS</a></li>
            @endauth
            <li class="{{ Route::is('blog.index') ? 'active' : '' }}"><a href="{{ route('blog.index') }}">BLOG</a></li>

            <li class="{{ Route::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">CONTACT US</a></li>
          </ul>

          {{-- Mobile menu section --}}
          <ul class="sidenav blue darken-3" id="mobile-menu">
              <h2 class="center my-5 font-bold">{{ config('app.name') }}</h2>

            <li class="{{ Route::is('home') ? 'active' : '' }}">
               <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'white-text' : 'grey-text' }}">{{ __('Home') }}</a>
            </li>

            <li class="{{ Route::is('about') ? 'active' : '' }}">
              <a href="{{ route('about') }}" class="{{ Route::is('about') ? 'white-text' : 'grey-text text-lighten-2' }}">{{ __('About Us') }}</a>
            </li>

            <li class="{{ Route::is('plans') ? 'active' : '' }}"><a href="{{ route('plans') }}" class="{{ Route::is('plans') ? 'white-text' : 'grey-text text-lighten-2' }}">Investment Plans</a></li>
            @guest
                <li><a href="{{ route('login') }}" class="{{ Route::is('login') ? 'white-text' : 'grey-text text-lighten-2' }}">Log In</a></li>
                <li><a href="{{ route('register') }}" class="{{ Route::is('register') ? 'white-text' : 'grey-text text-lighten-2' }}">Sign Up</a></li>
            @endguest
            @auth
                <li><a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'white-text' : 'grey-text text-lighten-2' }}">Dashboard</a></li>

                <li><a href="{{ route('profile') }}" class="{{ Route::is('profile') ? 'white-text' : 'grey-text text-lighten-2' }}">Profile</a></li>

                <li><a href="{{ route('settings') }}" class="{{ Route::is('settings') ? 'white-text' : 'grey-text text-lighten-2' }}">Settings</a></li>
            @endauth
            <li class="{{ Route::is('blog.index') ? 'active' : '' }}"><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'white-text' : 'grey-text text-lighten-2' }}">Blog</a></li>

            <li class="{{ Route::is('contact') ? 'active' : '' }}" class="{{ Route::is('contact') ? 'white-text' : 'grey-text' }}"><a href="{{ route('contact') }}">Contact Us</a></li>

            <li class="{{ Route::is('terms') ? 'active' : '' }}"><a href="{{ route('terms') }}" class="{{ Route::is('terms') ? 'white-text' : 'grey-text text-lighten-2' }}">Terms of Service</a></li>

            <li class="{{ Route::is('policy') ? 'active' : '' }}"><a href="{{ route('policy') }}" class="{{ Route::is('policy') ? 'white-text' : 'grey-text text-lighten-2' }}">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </nav>

</div>
