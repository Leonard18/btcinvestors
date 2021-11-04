@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Account Transactions">
    <title>{{ config('app.name') }} - Transactions</title>
@endsection

@section('page-name')
    Transaction Records
    @section('small-page-name', 'transactions')
@endsection

@section('content')

    {{-- User Transactions --}}
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">


           <h3 class="pb-4 underline mt-20" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Transaction Records - All Time</h3>

           <table class="table responsive-table table-striped table-hover">
            <thead class="purple darken-2 white-text">
                <tr>
                    <th data-field="id">#</th>
                    <th data-field="type">Transaction type</th>
                    <th data-field="description">Description</th>
                    <th data-field="status">Status</th>
                    <th data-field="date">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($userTransactions as $usertransaction)
                 <tr>
                    <td>{{ $usertransaction->id }}</td>
                    <td>{{ $usertransaction->type }}</td>
                    <td>{{ $usertransaction->description }}</td>
                    <td>{{ $usertransaction->status }}</td>
                    <td>{{ $usertransaction->created_at->diffForHumans() }}</td>
                 </tr>
                @empty
                    <tr>
                       <td colspan="6">There are no histories on the platform yet.</td>
                    </tr>
                @endforelse
                {{-- <tr>
                    <td>{{ $userTransactions->id }}</td>
                    <td>{{ $userTransactions->type }}</td>
                    <td>{{ $userTransactions->description }}</td>
                    <td>{{ $userTransactions->status }}</td>
                    <td>{{ $userTransactions->created_at->diffForHumans() }}</td>
                 </tr> --}}
            </tbody>
        </table>

        </div>

    </div>


    {{-- All Transactions section --}}
    	  
	{{-- only the admin can see this part --}}
	@can('admin')

			<div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">

            <h5 class="pb-4 underline mt-20 grey-text">All Transaction Records</h5>

            <table class="table responsive-table table-striped table-hover">
                <thead class="blue darken-2 white-text">
                    <tr>
                        <th data-field="id">#</th>
                        <th data-field="investor">Investor</th>
                        <th data-field="type">Transaction type</th>
                        <th data-field="description">Description</th>
                        <th data-field="status">Status</th>
                        <th data-field="date">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allTransactions as $alltransaction)
                     <tr>
                        <td>{{ $alltransaction->id }}</td>
                        <td>{{ $alltransaction->username }}</td>
                        <td>{{ $alltransaction->type }}</td>
                        <td>{{ $alltransaction->description }}</td>
                        <td>{{ $alltransaction->status }}</td>
                        <td>{{ $alltransaction->created_at->diffForHumans() }}</td>
                     </tr>
                    @empty
                        <tr>
                           <td colspan="6">There are no histories on the platform yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

	@endcan

    {{-- end of all transaction records... --}}



@endsection

@section('footerContent')

@endsection
