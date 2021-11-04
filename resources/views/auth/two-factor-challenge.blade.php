@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Two Factor Authentication - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Two Factor Authentication</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Two Factor Authentication
    {{-- @section('small-page-name', 'two-factor-authentication') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">

        <div class="rounded-md p-4 login-form-section container" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">
            <div class="row justify-content-center center">
                <div class="col-md-6">
                    <div class="py-3">
                        <h4>Two Factor Authentication</h4>
                        <p>Please enter your authentication code from your authenticator application to login.</p>
                    </div>
                 <form action="{{ url('/two-factor-challenge') }}" method="POST" class="pt-3">
                     @csrf
                     <div class="form-group">
                       <input type="text" name="code" id="code" class="form-control rounded black-text pl-3 border-white @error('code') border-red @enderror" placeholder="Confirm 2fa code" style="width: 96% !important; border: 1px solid darkgray !important;">
                       @error('code')
                           <span class="red-text">{{ $message }}</span>
                       @enderror
                     </div>
                     {{-- button section --}}
                     <button type="submit" class="btn btn-block font-weight-bolder btn-large bg-white hover:bg-blue-100" role="button" style="background: {{ env('APP_WHITE_COLOR') }} !important; color: {{ env('APP_PRIMARY_COLOR') }} !important; width: 100% !important;">Confirm code</button>
                 </form>

                 <div class="py-5">
                    <div class="row">
                        <div class="col-md-7">
                            <p>Use recovery code instead</p>
                        </div>
                        <div class="col-md-5">
                            <!-- Modal Trigger -->
                            <a class="waves-effect waves-light blue darken-3 white-text btn modal-trigger" href="#modal1">Recovery code</a>
                            
                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                              <div class="modal-content">
                                <h4>Enter Recovery Code</h4>
                                <p>Please enter your two factor authentication revocery code to login to your account.</p>

                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form action="{{ url('/two-factor-challenge') }}" method="POST" class="pt-3">
                                            @csrf
                                            <div class="form-group">
                                              <input type="text" name="code" id="code" class="form-control rounded black-text pl-3 border-white @error('code') border-red @enderror" placeholder="Confirm recovery code" style="width: 96% !important; border: 1px solid darkgray !important;">
                                              @error('code')
                                                  <span class="red-text">{{ $message }}</span>
                                              @enderror
                                            </div>
                                            {{-- button section --}}
                                            <button type="submit" class="btn btn-block font-weight-bolder btn-large bg-white hover:bg-blue-100" role="button" style="background: {{ env('APP_WHITE_COLOR') }} !important; color: {{ env('APP_PRIMARY_COLOR') }} !important; width: 100% !important;">Confirm recovery code</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="modal-footer pt-20">
                                
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn red white-text darken-2">Close</a>
                                  </div>

                              </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 
                </div>
            </div>
         </div>
       
    </section>
    
@endsection

@section('footerContent')
    
@endsection