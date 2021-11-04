@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Ticket">
    <title>{{ config('app.name') }} - Ticket</title>
@endsection

@section('page-name')
    Ticket
    @section('small-page-name', 'ticket')
@endsection

@section('content')

{{-- even if the route is protected, only the admin can see this part --}}

    @can('admin')
        
    <div class="my-5">

        <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <div class="section-header">
                <h4 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">All Submitted Tickets</h4>
            </div>

            <table class="table responsive-table table-striped table-hover">
                <thead class="purple darken-2 white-text">
                    <tr>
                        <th data-field="id">#</th>
                        <th data-field="name">Name</th>
                        <th data-field="email">Email</th>
                        <th data-field="subject">Subject</th>
                        <th data-field="message">Message</th>
                        <th data-field="date">Date</th>
                        <th data-field="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $ticket->name }}</td>
                           <td>{{ $ticket->email }}</td>
                           <td>{{ $ticket->subject }}</td>
                           <td>{{ $ticket->message }}</td>
                           <td>{{ $ticket->created_at->diffForHumans() }}</td>
                           <td>
                               <button onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-ticket-{{ $ticket->id }}-{{ $ticket->subject }}').submit() }" type="button" class="btn btn-small red white-text">DELETE</button>
                           </td>
                           <form id="delete-ticket-{{ $ticket->id }}-{{ $ticket->subject }}" action="{{ route('ticket.destroy', $ticket) }}" method="POST" style="display: none !important;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">There are no transactions yet. Create one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

           
        </div>
    
    </div>

    @endcan

{{-- even if the route is protected, only the admin can see this part --}}

@endsection

@section('footerContent')

@endsection
