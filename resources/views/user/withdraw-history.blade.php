@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Withdrawal History">
    <title>{{ config('app.name') }} - Withdraw History</title>
@endsection

@section('page-name')
    Withdrawal History
    @section('small-page-name', 'withdraw-history')
@endsection

@section('content')

    {{-- Account section --}}
     <div class="my-5">

    <div class="container-fluid p-5 rounded " style="background: {{ env('APP_WHITE_COLOR') }} !important;">
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




	{{-- only the admin can see this part... --}}
    {{-- All Request withdrawal section --}}
    		@can('admin')

				<div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <div class="section-header">
                <h4 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">All Withdrawal Requests Summary</h4>
            </div>
           <div class="my-3">
               <table>
                   <thead>
                       <tr>
                           <th data-field="id">#</th>
                           <th data-field="amount">Amount (&#x20A6;)</th>
                           <th data-field="status">Status</th>
                           <th data-field="name">User</th>
                           <th data-field="date">Date</th>
                       </tr>
                   </thead>
                   <tbody>
                       @forelse ($allRequests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $request->amount }}</td>
                                <td>{{ $request->status }}</td>
                                <td>{{ $request->user->username }}</td>
                                <td>{{ $request->created_at->diffForHumans() }}</td>
                            </tr>
                       @empty
                            <tr>
                                <td colspan="4">No don't have any withdrawal request. Start requesting <strong><a href="{{ route('withdraw') }}"> here.</a></strong></td>
                            </tr>
                       @endforelse
                   </tbody>
               </table>
           </div>
        </div>

    </div>

		@endcan 
    {{-- End of All Wihdrawal setion --}}


    {{-- Request withdrawal section --}}
     <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h4 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Withdrawal Request Summary</h4>
        </div>
       <div class="my-3">
           <table>
               <thead>
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="id">Amount (&#x20A6;)</th>
                       <th data-field="name">Status</th>
                       <th data-field="price">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse (auth()->user()->withdrawalrequests as $request)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $request->amount }}</td>
                            <td>{{ $request->status }}</td>
                            <td>{{ $request->date }}</td>
                        </tr>
                   @empty
                        <tr>
                            <td colspan="4">You don't have any withdrawal request. Start requesting <strong><a href="{{ route('withdraw') }}"> here.</a></strong></td>
                        </tr>
                   @endforelse
               </tbody>
           </table>
       </div>
    </div>

</div>
    {{-- End of Request withdrawal section --}}




@endsection

@section('footerContent')

@endsection
