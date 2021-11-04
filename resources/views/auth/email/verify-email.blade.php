@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Welcome page">
   <title>{{ config('app.name') }} - Verify email</title>
@endsection

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">
       <div class="row justify-content-center">
           <div class="col-md-5 my-3 p-5">
               {{-- status section --}}
                   
               @if (session('status'))
                <div class="py-1">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                        {{ session('status') }}
                    </div>
                </div>
               @endif
                {{-- end of status section --}}
               <h3 class="pb-2">Verify Your Email Address</h3>
               <p>You must verify your email address to access your dashboard. Check your email for a verification link.</p>

               <div class="form-reset-button py-2">
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn black white-text btn-block btn-large">Resend Link</button>
                </form>
                
               </div>
           </div>
       </div>
    </section>
    
@endsection

@section('footerContent')
    
@endsection