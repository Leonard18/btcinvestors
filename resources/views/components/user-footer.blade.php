<div class="mt-7 mb-1">
   
    <div class="container-fluid py-2" style="background: {{ env('APP_PRIMARY_COLOR') }}">
       <div class="container">
           <div class="row">

               {{-- Privacy policy section --}}
               <div class="col-md-6">
                  <p>
                      <a href="{{ route('policy') }}" class="white-text">Privacy Policy</a>
                      <a href="{{ route('terms') }}" class="white-text ml-2">Terms of Service</a>
                  </p> 
               </div>
               
               {{-- Copy right section --}}
               <div class="col-md-6">
                <p class="white-text">&copy; <span class="ml-2 mr-2">{{ Carbon::now()->year }}</span> <a href="{{ route('home') }}" class="white-text mr-2">{{ config('app.name') }}.</a> <span>All rights reserved.</span></p>
               </div>
           </div>
       </div>
    </div>

</div>