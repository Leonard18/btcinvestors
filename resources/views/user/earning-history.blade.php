@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Earning History">
    <title>{{ config('app.name') }} - Earning History</title>
@endsection

@section('page-name')
    Earning History
    @section('small-page-name', 'earning-history')
@endsection

@section('content')

    {{-- user history --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">


           <h3 class="pb-4 underline mt-20" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Earnings History - All Time</h3>

           <h5 class="pb-4 underline mt-20 grey-text">REFERRAL EARNING</h5>

           <table class="table responsive-table table-striped table-hover">
            <thead class="orange darken-2 white-text">
                <tr>
                    <th data-field="id">#</th>
                    <th data-field="type">Transaction type</th>
                    <th data-field="amount">Amount (&#x20A6;)</th>
                    <th data-field="status">Status</th>
                    <th data-field="date">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($userHistories as $userhistory)
                 <tr>
                    <td>{{ $userhistory->id }}</td>
                    <td>{{ $userhistory->transaction_type }}</td>
                    <td>{{ $userhistory->amount }}</td>
                    <td>{{ $userhistory->status }}</td>
                    <td>{{ $userhistory->created_at->diffForHumans() }}</td>
                 </tr>
                @empty
                    <tr>
                       <td colspan="5">There are no histories on the platform yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        </div>

    </div>


    {{-- All Investment earning section --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

            <h5 class="pb-4 underline mt-20 grey-text">INVESTMENT EARNINGS</h5>

           <table class="table responsive-table table-striped table-hover">
               <thead class="green darken-2 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="type">Transaction type</th>
                       <th data-field="amount">Amount (&#x20A6;)</th>
                       <th data-field="user">User id</th>
                       <th data-field="status">Status</th>
                       <th data-field="date">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($allHistories as $allhistory)
                    <tr>
                       <td>{{ $allhistory->id }}</td>
                       <td>{{ $allhistory->transaction_type }}</td>
                       <td>{{ $allhistory->amount }}</td>
                       <td>{{ $allhistory->user_id }}</td>
                       <td>{{ $allhistory->status }}</td>
                       <td>{{ $allhistory->created_at->diffForHumans() }}</td>
                    </tr>
                   @empty
                       <tr>
                          <td colspan="5">There are no histories on the platform yet.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>


        </div>

    </div>

    {{-- All Incentive earning section --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

            <h5 class="pb-4 underline mt-20 grey-text">INCENTIVE EARNINGS</h5>

           <table class="table responsive-table table-striped table-hover">
               <thead class="purple darken-2 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="type">Transaction type</th>
                       <th data-field="amount">Amount (&#x20A6;)</th>
                       <th data-field="user">User id</th>
                       <th data-field="status">Status</th>
                       <th data-field="date">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($allHistories as $allhistory)
                    <tr>
                       <td>{{ $allhistory->id }}</td>
                       <td>{{ $allhistory->transaction_type }}</td>
                       <td>{{ $allhistory->amount }}</td>
                       <td>{{ $allhistory->user_id }}</td>
                       <td>{{ $allhistory->status }}</td>
                       <td>{{ $allhistory->created_at->diffForHumans() }}</td>
                    </tr>
                   @empty
                       <tr>
                          <td colspan="5">There are no histories on the platform yet.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>


        </div>

    </div>

    {{-- All History section --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

            <h5 class="pb-4 underline mt-20 grey-text">ALL HISTORY EARNING</h5>

           <table class="table responsive-table table-striped table-hover">
               <thead class="blue darken-2 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="type">Transaction type</th>
                       <th data-field="amount">Amount (&#x20A6;)</th>
                       <th data-field="user">User id</th>
                       <th data-field="status">Status</th>
                       <th data-field="date">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($allHistories as $allhistory)
                    <tr>
                       <td>{{ $allhistory->id }}</td>
                       <td>{{ $allhistory->transaction_type }}</td>
                       <td>{{ $allhistory->amount }}</td>
                       <td>{{ $allhistory->user_id }}</td>
                       <td>{{ $allhistory->status }}</td>
                       <td>{{ $allhistory->created_at->diffForHumans() }}</td>
                    </tr>
                   @empty
                       <tr>
                          <td colspan="5">There are no histories on the platform yet.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>


        </div>

    </div>

@endsection

@section('footerContent')

@endsection
