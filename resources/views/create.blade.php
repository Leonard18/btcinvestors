@extends('layouts.app')

@section('headerContent')
    <title>{{ config('app.name') }} - Create User</title>
@endsection

@section('page-name')
    Create New User
    @section('small-page-name', 'create-user')
@endsection

@section('content')

    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">


           <h3 class="pb-4 underline mt-20" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Add New User</h3>
           
           <div class="mt-3">
               <form action="{{ route('user.store') }}" method="POST">
                   @csrf
                   <div class="row justify-content-center">

                    {{-- first name --}}
                       <div class="col-md-4">
                           <div class="form-group">
                               <label class="control-label" for="firstName">First Name</label>
                               <input type="text" name="firstName" value="{{ old('firstName') }}" class="form-control" id="firstName" placeholder="First name">
                               @error('firstName')
                                <span class="red-text">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>

                       {{-- Middle name section --}}
                       <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="middleName">Middle Name</label>
                            <input type="text" name="middleName" value="{{ old('middleName') }}" class="form-control" id="middleName" placeholder="Middle name">
                            @error('middleName')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                       {{-- end of middle name --}}

                    {{-- last name section --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="lastName">Last Name</label>
                            <input type="text" name="lastName" value="{{ ('lastName') }}" class="form-control" id="lastName" placeholder="Last name">
                            @error('lastName')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- end last name section --}}

                    {{-- email section --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Email address">
                            @error('email')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- end of email section --}}

                    {{-- Phone --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" placeholder="Phone">
                            @error('phone')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- end of phone section --}}

                    {{-- username --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Username">
                            @error('username')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- end of username --}}

                    {{-- Investment wallet --}}
                    
                    {{-- deposit section --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="username">Investment</label>
                            <input type="number" name="investment" value="{{ old('investment') }}" class="form-control" id="investment">
                            @error('')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Earnings --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="earning">Earnings</label>
                            <input type="text" name="earning" value="{{ old('earning') }}" class="form-control" id="earning">
                            @error('earning')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Withdrawable --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="withdrawable">Withdrawable</label>
                            <input type="text" name="withdrawable" value="{{ old('withdrawable')  }}" class="form-control" id="withdrawable">
                            @error('withdrawable')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- end of Investment account --}}

                    {{-- Password section --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="text" name="password" class="form-control" id="username" placeholder="Password">
                            @error('password')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- confirm password  --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">Confirm Password</label>
                            <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
                            @error('password')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Password section --}}
                       
                       
                   </div>

                   <button type="submit" class="green darken-4 btn btn-block btn-large white-text">Create New User</button>
               </form>
           </div>

          

        </div>

    </div>


@endsection

@section('footerContent')

@endsection
