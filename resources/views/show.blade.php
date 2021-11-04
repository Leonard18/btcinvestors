@extends('layouts.app')

@section('headerContent')
    <title>{{ config('app.name') }} - User</title>
@endsection

@section('page-name')
    {{ $user->first_name }} {{ $user->last_name }}
    @section('small-page-name', 'user')
@endsection

@section('content')

    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">


           <h3 class="pb-4 underline mt-20" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Update User</h3>
           
           <div class="mt-3">
               <form action="{{ route('user.update', $user) }}" method="POST">
                   @csrf
                   @method('PUT')
                   <div class="row justify-content-center">

                    {{-- first name --}}
                       <div class="col-md-4">
                           <div class="form-group">
                               <label class="control-label" for="firstName">First Name</label>
                               <input type="text" name="firstName" value="{{ $user->first_name }}" class="form-control" id="firstName" required>
                               @error('firstName')
                                <span class="red-text">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>

                       {{-- Middle name section --}}
                       <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="middleName">Middle Name</label>
                            <input type="text" name="middleName" value="{{ $user->middle_name }}" class="form-control" id="middleName">
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
                            <input type="text" name="lastName" value="{{ $user->last_name }}" class="form-control" id="lastName" required>
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
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" required>
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
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="phone" required>
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
                            <input type="text" name="username" value="{{ $user->username }}" class="form-control" id="username" required>
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
                            <input type="number" name="investment" value="{{ $user->wallet->investment }}" class="form-control" id="investment">
                            @error('')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Earnings --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="earning">Earnings</label>
                            <input type="text" name="earning" value="{{ $user->wallet->earning }}" class="form-control" id="earning">
                            @error('earning')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Withdrawable --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="withdrawable">Withdrawable</label>
                            <input type="text" name="withdrawable" value="{{ $user->wallet->withdrawable }}" class="form-control" id="withdrawable">
                            @error('withdrawable')
                             <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- end of Investment account --}}
                       
                       
                   </div>

                   <button type="submit" class="green btn btn-block btn-large green white-text">Update User</button>
               </form>
           </div>

          

        </div>

    </div>


@endsection

@section('footerContent')

@endsection
