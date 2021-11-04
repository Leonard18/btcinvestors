@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} -  Account Deposits">
    <title>{{ config('app.name') }} - Deposit History</title>
@endsection

@section('page-name')
    Deposit History
    @section('small-page-name', 'deposit-history')
@endsection

@section('content')

    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

            <h3 class="pb-4 underline mt-20" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Deposit - All Time</h3>

           <h4 class="pb-4 underline mt-20 grey-text">Active Investments</h4>

           <table class="table responsive-table table-striped table-hover">
               <thead class="green white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="name">Plan</th>
                       <th data-field="amount">Amount</th>
                       <th data-field="interval">Return interval</th>
                       <th data-field="percentage">Percentage (%)</th>
                       <th data-field="user">Investor</th>
                       <th data-field="price">Status</th>
                       <th data-field="price">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($activeInvestments as $activeInvestment)
                    <tr>
                       <td>{{ $activeInvestment->id }}</td>
                       <td>{{ $activeInvestment->plan_name }}</td>
                       <td>{{ $activeInvestment->investment_amount }}</td>
                       <td>{{ $activeInvestment->plan_interval }}</td>
                       <td>{{ $activeInvestment->plan_percent }}</td>
                       <td>{{ $activeInvestment->username }}</td>
                       <td>{{ $activeInvestment->status ? 'Active' : 'Not Active' }}</td>
                       <td>{{ $activeInvestment->created_at->diffForHumans() }}</td>
                    </tr>
                   @empty
                       <tr>
                          <td colspan="7">You don't have any deposits.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>

        </div>

    </div>

    {{-- Deposits section --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

            <h4 class="pb-4 underline mt-20 grey-text">Inactive Investments</h4>

           <table class="table responsive-table table-striped table-hover">
               <thead class="blue white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="name">Plan</th>
                       <th data-field="amount">Amount</th>
                       <th data-field="interval">Return interval</th>
                       <th data-field="percentage">Percentage (%)</th>
                       <th data-field="investor">Investor</th>
                       <th data-field="price">Status</th>
                       <th data-field="price">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($inActiveInvestments as $inActiveInvestment)
                    <tr>
                       <td>{{ $inActiveInvestment->id }}</td>
                       <td>{{ $inActiveInvestment->plan_name }}</td>
                       <td>{{ $inActiveInvestment->investment_amount }}</td>
                       <td>{{ $inActiveInvestment->plan_interval }}</td>
                       <td>{{ $inActiveInvestment->plan_percent }}</td>
                       <td>{{ $inActiveInvestment->username }}</td>
                       <td>{{ $inActiveInvestment->status ? 'Active' : 'Not Active' }}</td>
                       <td>{{ $inActiveInvestment->created_at->diffForHumans() }}</td>
                    </tr>
                   @empty
                       <tr>
                          <td colspan="8">You don't have any deposits.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>


        </div>

    </div>

@endsection

@section('footerContent')

@endsection
