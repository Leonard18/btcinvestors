@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Make Deposit">
    <title>{{ config('app.name') }} - Make Deposit</title>
@endsection

@section('page-name')
    Make Deposit
    @section('small-page-name', 'make-deposit')
@endsection

@section('content')

    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

           {{-- <h4 class="grey-text text-darken-2 center pb-4"></h4> --}}
           <h3 class="pb-4 underline grey-text">Make Deposit</h3>
                {{-- check if the session has success... --}}
               @if (Session::has('success'))
                <div class="col s12 l12 green p-4">
                    <ul class="collection with-header s12 l12">

                        <li class="collection-header">
                        <h1>Deposit Info</h1>
                        </li>
                        <li class="collection-item"><div>Plan name <span class="secondary-content" style="font-weight: bolder !important;">{{ session('plan_name') }}</span></div></li>

                        <li class="collection-item"><div>Investment amount <span class="secondary-content" style="font-weight: bolder !important;">{{ session('investment_amount') }}</span></div></li>

                        <li class="collection-item"><div>Expected return <span class="secondary-content" style="font-weight: bolder !important;">{{ session('expected_amount') }}</span></div></li>
                        <li class="collection-item"><div>Interval <span class="secondary-content" style="font-weight: bolder !important;">{{ session('plan_interval') }}</span></div></li>
                    </ul>
                </div>
               @endif
               {{-- end of check if the session has success... --}}
           <div class="row">

               <div class="col s8 m8 l8 mt-40">
                   <form action="{{ route('new-deposit') }}" method="POST">
                       @csrf
                     <div class="input-field col s12 l6">
                       <select name="investment_plan" id="investment_plan">
                           <option value="" disabled selected>Select investment plan</option>
                           @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name }} - commission paid {{ $plan->interval }} </option>
                           @endforeach
                       </select>
                       <label for="investment_plan">Select investment plan</label>
                     </div>
                     <div class="input-field col s12 l6">
                       <input type="number" name="investment_amount" id="investment_amount" class="validate">
                       <label for="investment_amount">Amount to invest</label>
                     </div>
                     <button type="submit" class="btn btn-large btn-block white-text green">INVEST NOW</button>
                   </form>
               </div>
           </div>


        </div>


    </div>

@endsection

@section('footerContent')

@endsection
