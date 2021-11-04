@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} User Dashboard">
    <title>{{ config('app.name') }} - Dashboard</title>
@endsection

@section('page-name')
    Dashboard
    @section('small-page-name', 'home')
@endsection

@section('content')
    <x-user-details />

    {{-- Account section --}}
     <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Account Section</h3>
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


	{{-- Only the admin can see this part...  --}}
	{{-- Active investments...  --}}
	@can('admin')
		<div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Active Investments</h3>

           <table class="table responsive-table table-striped table-hover">
               <thead class="green lighten-1 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="name">Plan</th>
                       <th data-field="price">Comm. rate</th>
                       <th data-field="price">Expiring date</th>
                       <th data-field="price">Activation Date</th>
                       <th data-field="price">Invested amount</th>
                       <th data-field="price">Return amount</th>
                   </tr>
               </thead>
               <tbody>
                  @forelse ($activeInvestments as $investment)
                    <tr>
                        <td>{{ $investment->id }}</td>
                        <td>{{ $investment->plan_name }}</td>
                        <td>{{ $investment->plan_percent }}</td>
                        <td>{{ $investment->plan_duration }}</td>
                        <td>{{ $investment->updated_at->diffForHumans() }}</td>
                        <td>{{ $investment->investment_amount }}</td>
                        <td>{{ $investment->expected_amount }}</td>
                    </tr>
                  @empty
                      <tr>
                          <td colspan="7">There are no active investments.</td>
                      </tr>
                  @endforelse
               </tbody>
           </table>

          </div>

    </div>

	@endcan
    


    {{-- Deposits section --}}
    <div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Deposits History</h3>

       <table class="table responsive-table table-striped table-hover">
           <thead class="blue darken-4 white-text">
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
               @forelse ($userDeposits as $deposit)
                <tr>
                   <td>{{ $deposit->id }}</td>
                   <td>{{ $deposit->plan_name }}</td>
                   <td>{{ $deposit->investment_amount }}</td>
                   <td>{{ $deposit->plan_interval }}</td>
                   <td>{{ $deposit->plan_percent }}</td>
                   <td>{{ $deposit->status ? 'Active' : 'Not Active' }}</td>
                   <td>{{ $deposit->created_at->diffForHumans() }}</td>
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

    {{-- End of deposits section --}}



    {{-- All withdrawal section --}}
	{{-- only the admin can see this part --}}
	@can('admin')
		<div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Withdrawal Requests</h3>

           <table class="table responsive-table table-striped table-hover">
               <thead class="gold darken-4 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="amnount">Amount</th>
                       <th data-field="user">User</th>
                       <th data-field="status">Status</th>
                       <th data-field="approved">Approved</th>
                       <th data-field="date">Date</th>
                       <th data-field="action">Action</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($withdrawalRequests as $withdrawalRequest)
                       <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $withdrawalRequest->amount }}</td>
                          <td>{{ $withdrawalRequest->user->username }}</td>
                          <td>{{ $withdrawalRequest->status }}</td>
                          <td class="font-bold {{ $withdrawalRequest->approved ? 'green-text' : 'red-text'}}">{{ $withdrawalRequest->approved ? "PAID" : "UNPAID" }}</td>
                          <td>{{ $withdrawalRequest->created_at->diffForHumans() }}</td>
                          <td>
                              <a onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('approve-{{ $withdrawalRequest->id }}-{{ $withdrawalRequest->id }}').submit() }" class="btn btn-small green darken-2 white-text {{ $withdrawalRequest->approved ? 'disabled' : '' }} ">Approve</a>

                              <form id="approve-{{ $withdrawalRequest->id }}-{{ $withdrawalRequest->id }}" action="{{ route('approve', $withdrawalRequest->id) }}" method="post">
                                  @csrf

                              </form>

                          </td>
                       </tr>
                   @empty
                       <tr>
                           <td colspan="6">There are no withdrawal requests yet.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>

          </div>

    </div>
	@endcan
    
    {{-- End of Withdrawal request... --}}



    {{-- All withdrawal section --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Withdrawal Requests</h3>

           <table class="table responsive-table table-striped table-hover">
               <thead class="teal darken-2 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="amnount">Amount</th>
                       <th data-field="status">Status</th>
                       <th data-field="approved">Approved</th>
                       <th data-field="date">Date</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse (auth()->user()->withdrawalrequests as $userwithdrawalRequest)
                       <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $userwithdrawalRequest->amount }}</td>
                          <td>{{ $userwithdrawalRequest->status }}</td>
                          <td class="font-bold {{ $userwithdrawalRequest->approved ? 'green-text' : 'red-text' }}">{{ $userwithdrawalRequest->approved ? 'PAID' : 'UNPAID' }}</td>
                          <td>{{ $userwithdrawalRequest->created_at->diffForHumans() }}</td>
                       </tr>
                   @empty
                       <tr>
                           <td colspan="6">You don't have any withdrawal requests yet.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>

          </div>

    </div>
    {{-- End of Withdrawal request... --}}


    {{-- User transaction section --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Transaction History</h3>

           <table class="table responsive-table table-striped table-hover">
               <thead class="orange darken-2 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="name">Type</th>
                       <th data-field="price">Description</th>
                       <th data-field="price">Date</th>
                       <th data-field="price">Status</th>
                   </tr>
               </thead>
               <tbody>
                   @forelse ($userTrans as $userTran)
                       <tr>
                          <td>{{ $userTran->id }}</td>
                          <td>{{ $userTran->type }}</td>
                          <td>{{ $userTran->description }}</td>
                          <td>{{ $userTran->created_at }}</td>
                          <td>{{ $userTran->status }}</td>
                       </tr>
                   @empty
                       <tr>
                           <td colspan="6">There are no transactions yet. Create one.</td>
                       </tr>
                   @endforelse
               </tbody>
           </table>

          </div>

    </div>
    {{-- End of user transaction --}}



    {{-- Transaction section --}}
	{{-- Only the admin can see this part --}}
	@can('admin')
		<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

        <div class="row">
            <div class="col s6 l6">
                <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">All Transaction History</h3>
            </div>
            <div class="col s2 l2 offset-s4 offset-l4">
               <!-- Modal Trigger -->
               <a class="waves-effect waves-light btn modal-trigger blue darken-4 white-text" href="#modal-transaction">Add Transaction</a>

               <!-- Modal Structure -->
               <div id="modal-transaction" class="modal modal-fixed-footer py-3">
                 <div class="modal-content">
                   <h4>Add New Transaction for a User</h4>
                   <p>Create a new transaction and assign it to a user.</p>
                   <hr>
                   <div class="row">
                       <div class="col s12 l12">
                           <form action="{{ route('transaction.store') }}" method="POST">
                               @csrf
                               <div class="input-field col s12 l4">
                                <select name="user" id="user">
                                    <option selected disabled>Select user</option>
                                    @forelse ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @empty
                                        <option disabled>No user</option>
                                    @endforelse
                                </select>
                                <label for="duration" data-error="wrong" data-success="right">Select user<span class="red-text"> *</span></label>
                            </div>
                            <div class="input-field col s12 l4">
                                <select name="type" id="type">
                                    <option selected disabled>Transaction type</option>
                                    <option value="debit">Debit</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="credit">Credit</option>
                                    <option value="reversal">Reversal</option>
                                    <option value="withdrawal">Withdrawal</option>
                                    <option value="earning">Earning</option>
                                </select>
                                <label for="duration" data-error="wrong" data-success="right">Transaction type<span class="red-text"> *</span></label>
                            </div>
                            <div class="input-field col s12 l4">
                                <select name="status" id="status">
                                    <option selected disabled>Select status</option>
                                    <option value="success">Success</option>
                                    <option value="declined">Declined</option>
                                    <option value="reversed">Reversed</option>
                                    <option value="pending">Pending</option>
                                    <option value="held">Held</option>
                                    <option value="approved">Approved</option>
                                    <option value="awaiting approval">Awaiting Approval</option>
                                </select>
                                <label for="duration" data-error="wrong" data-success="right">Transaction status<span class="red-text"> *</span></label>
                            </div>
                            <div class="input-field col s12 l12">
                                <textarea id="description" name="description" class="materialize-textarea"  cols="30" rows="10"></textarea>
                                <label for="description" data-error="wrong" data-success="right">Transaction description<span class="red-text"> *</span></label>
                            </div>
                       </div>
                   </div>
                 </div>
                 <div class="modal-footer">
                    <button type="submit" class="btn btn-large blue darken-4 white-text">Add Transaction</button>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                 </div>
               </form>
               </div>
            </div>
        </div>

       <table class="table responsive-table table-striped table-hover">
           <thead class="blue darken-4 white-text">
               <tr>
                   <th data-field="id">#</th>
                   <th data-field="type">Type</th>
                   <th data-field="description">Description</th>
                   <th data-field="username">Username</th>
                   <th data-field="date">Date</th>
                   <th data-field="status">Status</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($transactions as $transaction)
                   <tr>
                      <td>{{ $transaction->id }}</td>
                      <td>{{ $transaction->type }}</td>
                      <td>{{ $transaction->description }}</td>
                      <td>{{ $transaction->username }}</td>
                      <td>{{ $transaction->created_at }}</td>
                      <td>{{ $transaction->status}}</td>
                      <td>

                        {{-- <!-- Modal Trigger -->
                        <a class="waves-effect waves-light btn modal-trigger green darken-1 white-text" href="#modal-transaction-{{ $transaction->id }}-{{ $transaction->id }}">UPDATE</a>

                        <!-- Modal Structure -->
                        <div id="modal-transaction-{{ $transaction->id }}-{{ $transaction->id }}" class="modal modal-fixed-footer py-3">
                            <div class="modal-content">
                            <h4>Update {{ $transaction->username }} Transaction</h4>
                            <p>Update transaction and assign it to a user.</p>
                            <hr>
                            <div class="row">
                                <div class="col s12 l12">
                                    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST"
                                        @csrf
                                        @method('PUT')
                                        <div class="input-field col s12 l4">
                                            <select name="user" id="user">
                                                <option value="{{ $transaction->user_id }}" selected>{{ $transaction->username }}</option>
                                                @forelse ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                                                @empty
                                                    <option disabled>No user</option>
                                                @endforelse
                                            </select>
                                            <label for="duration" data-error="wrong" data-success="right">Select user<span class="red-text"> *</span></label>
                                        </div>
                                        <div class="input-field col s12 l4">
                                            <select name="type" id="type">
                                                <option selected value="{{ $transaction->type }}">{{ $transaction->type }}</option>
                                                <option value="debit">Debit</option>
                                                <option value="deposit">Deposit</option>
                                                <option value="credit">Credit</option>
                                                <option value="reversal">Reversal</option>
                                                <option value="withdrawal">Withdrawal</option>
                                                <option value="earning">Earning</option>
                                            </select>
                                            <label for="duration" data-error="wrong" data-success="right">Transaction type<span class="red-text"> *</span></label>
                                        </div>
                                        <div class="input-field col s12 l4">
                                            <select name="status" id="status">
                                                <option value="{{ $transaction->status }}" selected>{{ $transaction->status }}</option>
                                                <option value="success">Success</option>
                                                <option value="declined">Declined</                       <option value="reversed">Reversed</option>
                                                <option value="pending">Pending</option>
                                                <option value="held">Held</option>
                                                <option value="approved">Approved</option>
                                                <option value="awaiting approval">Awaiting Approval</option>
                                            </select>
                                            <label for="duration" data-error="wrong" data-success="right">Transaction status<span class="red-text"> *</span></label>
                                        </div>
                                        <div class="input-field col s12 l12">
                                            <textarea id="description" name="description" class="materialize-textarea"  cols="30" rows="10">{{ $transaction->description }}</textarea>
                                            <label for="description" data-error="wrong" data-success="right">Transaction description<span class="red-text"> *</span></label>
                                        </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-large blue darken-4 white-text">Update Transaction</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                            </div>
                        </form>
                        </div> --}}


                            <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn red darken-1 white-text">DELETE</button>
                            </form>
                      </td>
                   </tr>
               @empty
                   <tr>
                       <td colspan="7">There are no transactions yet. Create one.</td>
                   </tr>
               @endforelse
           </tbody>
       </table>

      </div>

</div>
	@endcan
    {{-- End of transaction section --}}




    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
           <div class="row justify-content-between">
               <div class="col-md-10">
                 <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Investment Plans</h3>
               </div>
               <div class="col-md-2 pt-3">

                    <!-- Modal Trigger -->
			{{-- only ther admin can see this button --}}
			@can('admin')
				<a class="waves-effect waves-light btn modal-trigger purple darken-2 white-text" href="#modal-plan">Add Plan</a>
			@endcan
                    

                    <!-- Modal Structure -->
                    <div id="modal-plan" class="modal modal-fixed-footer py-3">
                      <div class="modal-content">
                        <h4>Add New Investment Plan</h4>
                        <p>Add an investment plan to allow users a new investment opportunity.</p>
                        <hr>
                        <div class="row">
                            <div class="col s12 l12">
                                <form action="{{ route('plan.store') }}" method="POST">
                                    @csrf
                                    <div class="input-field col s12 l4">
                                        <input type="text" name="name" id="name" class="validate" placeholder="Name of investment plan">
                                        <label for="name" data-error="wrong" data-success="right">Plan Name<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <input type="number" name="percentage" id="percentage" class="validate" placeholder="Percentage of plan">
                                        <label for="percentage" data-error="wrong" data-success="right">Plan Percentage<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <select name="interval" id="interval">
                                            <option selected disabled>Select plan in</option>
                                            <option value="1">Weekly</option>
                                            <option value="2">Bi-Weekly</option>
                                            <option value="3">Monthly </option>
                                            <option value="4">Two Months</option>
                                            <option value="5">Three Months</option>
                                            <option value="6">Six Months</option>
                                            <option value="7">Ten Months</option>
					    <option value="8">Twelve Months</option>
                                        </select>
                                        <label for="interval" data-error="wrong" data-success="right">Plan Interval<span class="red-text"> *</span></label>
                                    </div>

                                     <div class="input-field col s12 l4">
                                        <select name="duration" id="duration">
                                            <option value="" selected disabled>Select plan duration</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Bi-Weekly">Bi-Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Two Months">Two Months</option>
                                            <option value="Three Months">Three Months</option>
                                            <option value="Six Months">Six Months</option>
                                            <option value="Ten Months">Ten Months</option>
                                            <option value="Twelve Months">Twelve Months</option>
                                            <option value="Twelve Months">Fifteen Months</option>
                                            <option value="Twelve Months">Eighteen Months</option>
                                            <option value="Twelve Months">Twenty-four Months</option>
                                            <option value="Twelve Months">Thirty-six Months</option>
                                        </select>
                                        <label for="duration" data-error="wrong" data-success="right">Plan Duration<span class="red-text"> *</span></label>
                                    </div>

                                     <div class="input-field col s12 l4">
                                        <input type="color" name="background_color" id="background_color" class="validate p-1" style="width: 100% !important; border: 2px solid black !important;">
                                        <label for="background_color" data-error="wrong" data-success="right">Plan Background Color<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <input type="color" name="text_color" id="text_color" class="validate p-1" style="width: 100% !important; border: 2px solid black !important;">
                                        <label for="text_color" data-error="wrong" data-success="right">Plan Text Color<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l12">
                                        <textarea id="description" name="description" class="materialize-textarea" placeholder="Describe plan" cols="30" rows="10"></textarea>
                                        <label for="description" data-error="wrong" data-success="right">Plan Description<span class="red-text"> *</span></label>
                                    </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                         <button type="submit" class="btn btn-large purple darken-2 white-text">Add New Plan</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                      </div>
                    </form>
                    </div>

               </div>

            </div>

           <table class="table responsive-table table-striped table-hover">
               <thead class="purple darken-2 white-text">
                   <tr>
                       <th data-field="id">#</th>
                       <th data-field="name">Name</th>
                       <th data-field="price">Commission rate</th>
                       <th data-field="price">Payment interval</th>
                       <th data-field="price">Plan Duration</th>
                       <th data-field="price">Description</th>
                       @can('admin') <th>Actions</th> @endcan
                   </tr>
               </thead>
               <tbody>
                   @forelse ($plans as $plan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->percentage }}%</td>
                        <td>paid once every <strong>{{ $plan->interval_name }}</strong></td>
                        <td>{{ $plan->duration }}</td>
                        <td>{{ $plan->description }}</td>
                        {{--only the admin can see this column --}}
			@can('admin')
					<td>


                        <!-- Modal Trigger -->
                    <a class="waves-effect waves-light modal-trigger green-text darken-2 font-bold" href="#modal-{{ $plan->name }}-edit-{{ $plan->id }}">UPDATE</a>

                    <!-- Modal Structure -->
                    <div id="modal-{{ $plan->name }}-edit-{{ $plan->id }}" class="modal modal-fixed-footer py-3">
                      <div class="modal-content">
                        <h4>Update <strong> {{ $plan->name }} </strong> Investment Plan</h4>
                        <p>Update plan to something more refined and increase your ROI.</p>
                        <hr>
                        <div class="row">
                            <div class="col s12 l12">
                                <form action="{{ route('plan.update', $plan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-field col s12 l4">
                                        <input type="text" name="name" id="name" class="validate" value="{{ $plan->name }}">
                                        <label for="name" data-error="wrong" data-success="right">Plan Name<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <input type="number" name="percentage" id="percentage" class="validate" value="{{ $plan->percentage }}">
                                        <label for="percentage" data-error="wrong" data-success="right">Plan Percentage<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <select name="interval" id="interval">
                                            <option value="{{ $plan->interval }}" selected>{{ $plan->interval_name }}</option>
                                            <option value="1">Weekly</option>
                                            <option value="2">Bi-Weekly</option>
                                            <option value="3">Monthly</option>
                                            <option value="4">Two Monthly</option>
                                            <option value="5">Three Months</option>
                                            <option value="6">Six Months</option>
                                            <option value="7">Ten Months</option>
                                            <option value="8">Twelve Months</option>
                                        </select>
                                        <label for="interval" data-error="wrong" data-success="right">Plan Interval<span class="red-text"> *</span></label>
                                    </div>

                                     <div class="input-field col s12 l4">
                                        <select name="duration" id="duration">
                                            <option value="{{ $plan->duration }}" selected>{{ $plan->duration }}</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Bi-Weekly">Bi-Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Two Months">Two Monthly</option>
                                            <option value="Three Months">Three Months</option>
                                            <option value="Six Months">Six Months</option>
                                            <option value="Ten Months">Ten Months</option>
                                            <option value="Twelve Months">Twelve Months</option>
                                        </select>
                                        <label for="duration" data-error="wrong" data-success="right">Plan Duration<span class="red-text"> *</span></label>
                                    </div>

                                     <div class="input-field col s12 l4">
                                        <input type="color" name="background_color" id="background_color" class="validate p-1" style="width: 100% !important; border: 2px solid black !important;" value="{{ $plan->background_color }}">
                                        <label for="background_color" data-error="wrong" data-success="right">Plan Background Color<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l4">
                                        <input type="color" name="text_color" id="text_color" class="validate p-1" style="width: 100% !important; border: 2px solid black !important;" value="{{ $plan->text_color }}">
                                        <label for="text_color" data-error="wrong" data-success="right">Plan Text Color<span class="red-text"> *</span></label>
                                    </div>

                                    <div class="input-field col s12 l12">
                                        <textarea id="description" name="description" class="materialize-textarea cols="30" rows="10">{{ $plan->description }}</textarea>
                                        <label for="description" data-error="wrong" data-success="right">Plan Description<span class="red-text"> *</span></label>
                                    </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                         <button type="submit" class="btn btn-large green darken-2 white-text">Add New Plan</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                      </div>
                    </form>
                    </div>
                            <a href="" class="red-text text-darken-2 font-bold ml-1" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $plan->id }}-{{ $plan->id }}').submit();">DELETE</a>

                            <form id="delete-form-{{ $plan->id }}-{{ $plan->id }}" action="{{ route('plan.destroy', $plan->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>

                        </td>
			@endcan
                    </tr>
                   @empty
                    <tr>
                        <td colspan="7">There are no plans. Create new one.</td>
                    </tr>
                   @endforelse
               </tbody>
           </table>

          </div>

    </div>


    {{-- Deposits section --}}
	{{-- only the admin can see this part --}}
	@can('admin')
			<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">All Deposit History</h3>

       <table class="table responsive-table table-striped table-hover">
           <thead class="blue darken-2 white-text">
               <tr>
                   <th data-field="id">#</th>
                   <th data-field="name">Plan name</th>
                   <th data-field="price">Amount</th>
                   <th data-field="price">Interval</th>
                   <th data-field="price">Username</th>
                   <th data-field="price">Percentage (%)</th>
                   <th data-field="price">Status</th>
                   <th data-field="price">Date</th>
                   <th data-field="price"></th>
               </tr>
           </thead>
           <tbody>
               @forelse ($allDeposits as $alldeposit)
                <tr>
                   <td>{{ $alldeposit->id }}</td>
                   <td>{{ $alldeposit->plan_name }}</td>
                   <td>{{ $alldeposit->investment_amount }}</td>
                   <td>{{ $alldeposit->plan_interval }}</td>
                   <td>{{ $alldeposit->username }}</td>
                   <td>{{ $alldeposit->plan_percent }}</td>
                   <td>{{ $alldeposit->status ? 'Active' : 'Not Active' }}</td>
                   <td>{{ $alldeposit->created_at->diffForHumans() }}</td>
                   <td>
                        <form action="{{ route('deposit-update', $alldeposit->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn {{ $alldeposit->status ? 'red' : 'green' }} white-text">{{ $alldeposit->status ? 'DEACTIVATE' : 'ACTIVATE' }}</button>
                        </form>
                    </td>



                </tr>
               @empty
                   <tr>
                      <td colspan="9">There are no deposits.</td>
                   </tr>
               @endforelse
           </tbody>
       </table>

      </div>

</div>

	@endcan
    {{-- End of deposits section --}}



    <x-calender-calculator />

     
@endsection

@section('footerContent')

@endsection
