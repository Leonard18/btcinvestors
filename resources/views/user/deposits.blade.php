@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Account Deposits">
    <title>{{ config('app.name') }} - Account Deposit</title>
@endsection

@section('page-name')
    Your Account Deposit
    @section('small-page-name', 'account-deposit')
@endsection

@section('content')

    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">


           <h3 class="pb-4 underline mt-20" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Deposit - All Time</h3>

           <h5 class="pb-4 underline mt-20 grey-text">ACTIVE DEPOSIT</h5>

           <table class="table responsive-table table-striped table-hover">
               <thead class="green white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="name">Plan name</th>
                       <th data-field="price">Investment amount</th>
                       <th data-field="price">Return interval</th>
                       <th data-field="price">Plan Percentage (%)</th>
                       <th data-field="price">Status</th>
                       <th data-field="price">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($userActiveDeposits as $activedeposit)
                    <tr>
                       <td>{{ $activedeposit->id }}</td>
                       <td>{{ $activedeposit->plan_name }}</td>
                       <td>{{ $activedeposit->investment_amount }}</td>
                       <td>{{ $activedeposit->plan_interval }}</td>
                       <td>{{ $activedeposit->plan_percent }}</td>
                       <td>{{ $activedeposit->status ? 'Active' : 'Not Active' }}</td>
                       <td>{{ $activedeposit->created_at->diffForHumans() }}</td>
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

            <h5 class="pb-4 underline mt-20 grey-text">INACTIVE DEPOSIT</h5>

           <table class="table responsive-table table-striped table-hover">
               <thead class="blue darken-2 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="name">Plan name</th>
                       <th data-field="price">Investment amount</th>
                       <th data-field="price">Return interval</th>
                       <th data-field="price">Plan Percentage (%)</th>
                       <th data-field="price">Status</th>
                       <th data-field="price">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($userInActiveDeposits as $inactivedeposit)
                    <tr>
                       <td>{{ $inactivedeposit->id }}</td>
                       <td>{{ $inactivedeposit->plan_name }}</td>
                       <td>{{ $inactivedeposit->investment_amount }}</td>
                       <td>{{ $inactivedeposit->plan_interval }}</td>
                       <td>{{ $inactivedeposit->plan_percent }}</td>
                       <td>{{ $inactivedeposit->status ? 'Active' : 'Not Active' }}</td>
                       <td>{{ $inactivedeposit->created_at->diffForHumans() }}</td>
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

@endsection

@section('footerContent')

@endsection
