<div style="background: {{ env('APP_SECONDARY_COLOR') }}" class="mt-5 pt-5">
   
    <section class="container">
        <div class="row">
            <div class="col-md-4 border-right">
                <h1 class="py-3"><a href="{{ route('home') }}" class="black-text">{{ config('app.name') }}</a></h1>
                <p>We are a forex and binary broker company. We trade the stock market effectively with our customers investments.</p>
                <p>We pay back percentages (as per investment amount) to our clients according to the term of contract.</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i> Phone: +1 (675) - 456 - 6034</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> Email: support@btcinvestor.com</p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Location: New York, USA</p>
            </div>
            <div class="col-md-4 border-right">
                <h5 class="py-3">Links & Pages</h5>
                <ul class="py-3">
                    <li class="my-2"><a href="{{ route('home') }}" class="blue-grey-text text-darken-4">Home</a></li>
                    @guest
                        <li class="my-2"><a href="#" class="blue-grey-text text-darken-4">Login</a></li>
                        <li class="my-2"><a href="#" class="blue-grey-text text-darken-4">Sign Up</a></li>
                    @endguest
                    @auth
                        <li class="my-2"><a href="{{ route('dashboard') }}" class="blue-grey-text text-darken-4">Account</a></li>
                        <li class="my-2"><a href="{{ route('settings') }}" class="blue-grey-text text-darken-4">Settings</a></li>
                    @endauth
                    <li class="my-2"><a href="{{ route('about') }}" class="blue-grey-text text-darken-4">About</a></li>
                    <li class="my-2"><a href="{{ route('contact') }}" class="blue-grey-text text-darken-4">Contact Us</a></li>
                    <li class="my-2"><a href="{{ route('plans') }}" class="blue-grey-text text-darken-4">Investment Plans</a></li>
                    <li class="my-2"><a href="{{ route('faq') }}" class="blue-grey-text text-darken-4">FAQs</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="py-3">Get in touch</h5>
                <p>Know us even better with a one on one contact with one of our agent in any of our locations. We will be happy to clear any doubts that you may have and to serve you better.</p>
                <button class="btn btn-large" style="background: {{ env('APP_TEAL_COLOR') }} !important;"><a href="{{ route('contact') }}" class="white-text">CONTACT US NOW!</a></button>
            </div>
        </div>
    </section>

    {{-- bottom footer row --}}
    <section class="container-fluid mt-5 pt-3 pb-2" style="background: {{ env('APP_PRIMARY_COLOR') }}">
       <div class="container">
           <div class="row">

               {{-- Privacy policy section --}}
               <div class="col-md-4">
                  <p>
                      <a href="{{ route('policy') }}" class="white-text">Privacy Policy</a>
                      <a href="{{ route('terms') }}" class="white-text ml-2">Terms of Service</a>
                  </p> 
               </div>

               {{-- Social links section --}}
               <div class="col-md-4">
                   <p>
                       <a href="#" class="white-text mr-3"><i class="fab fa-facebook fa-2x white-text" aria-hidden="true"></i></a>
                       <a href="#" class="white-text mr-3"><i class="fab fa-twitter fa-2x white-text" aria-hidden="true"></i></a>
                       <a href="#" class="white-text mr-3"><i class="fab fa-linkedin fa-2x white-text" aria-hidden="true"></i></a>
                   </p>
               </div>

               {{-- Copy right section --}}
               <div class="col-md-4">
                <p class="white-text">&copy; <span class="ml-2 mr-2">{{ Carbon::now()->year }}</span> <a href="{{ route('home') }}" class="white-text mr-2">{{ config('app.name') }}.</a> <span>All rights reserved.</span></p>
               </div>
           </div>
       </div>
    </section>

</div>