@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Withdraw">
    <title>{{ config('app.name') }} - Withdraw</title>
@endsection

@section('page-name')
    Withdraw
    @section('small-page-name', 'withdraw')
@endsection

@section('content')

    {{-- Account section --}}
     <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Account Summary</h3>
        </div>
       <div class="row">
            <!-- Investment -->
        <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card  blue darken-2 white-text py-3">
            <h1 class="center"><span style="text-shadow: 2px 2px 1px darkgray">&#x20A6;</span> <br> {{ $deposit }}</h1>
            <h4 class="center">Deposits</h4>
            </div>
          </div>

          <!-- Earned -->
          <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card  purple darken-2 white-text py-3">
            <h1 class="center"><span style="text-shadow: 2px 2px 1px darkgray">&#x20A6;</span> <br>  {{ $investment }}</h1>
            <h4 class="center">Invested</h4>
            </div>
          </div>

          <!-- Commisions -->
          <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card gold darken-2 white-text py-3">
            <h1 class="center"><span style="text-shadow: 2px 2px 1px darkgray">&#x20A6;</span> <br>  {{ $earning }}</h1>
            <h4 class="center">Earnings</h4>
            </div>
          </div>

          <!-- Withdrawn -->
          <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card green darken-2 white-text py-3">
            <h1 class="center"><span style="text-shadow: 2px 2px 1px darkgray">&#x20A6;</span> <br>  {{ $withdrawable }}</h1>
            <h4 class="center">Withdrawable</h4>
            </div>
          </div>
       </div>
    </div>

</div>
    {{-- End of Account section --}}

    {{-- Request withdrawal section --}}
     <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h4 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Request Withdrawal</h4>
        </div>
       <form action="{{ route('withdraw') }}" method="POST">
           @csrf
         <div class="input-field col s12 l12">
           <input type="number" name="amount" id="amount" class="validate rounded border">
           <label for="first_name">Enter Amount</label>
         </div>

         <div class="input-field col s12 l12">
           <button type="submit" class="btn btn-block btn-large green white-text">WITHDRAW</button>
         </div>
       </form>
    </div>

</div>
    {{-- End of Request withdrawal section --}}




@endsection

@section('footerContent')

@endsection
