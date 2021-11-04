@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - |Receipt">
    <title>{{ config('app.name') }} - Receipt</title>
@endsection

@section('page-name')
    Receipt
    @section('small-page-name', 'receipt')
@endsection

@section('content')

    {{-- Account section --}}
<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Submit Receipt</h3>
        </div>
        <form action="{{ route('receipt.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="input-field col s12 l12">
            <select name="type" id="type">
                <option selected disabled>Select receipt</option>
                <option value="1">Bank Slip</option>
                <option value="2">E-slip</option>
                <option value="3">Bank Teller</option>
                <option value="4">online transactional receipt</option>
                <option value="5">Others</option>
            </select>
            <label for="type">Select type</label>
            @error('type')
                <span class="red-text">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-field col s12 l12">
            <input type="file" name="image" id="image">
            @error('image')
                <span class="red-text">{{ $message }}</span>
            @enderror
          </div>
 
          <div class="input-field col s12 l12">
            <button type="submit" class="btn btn-block btn-large green white-text">Submit Receipt</button>
          </div>
        </form>
    </div>

</div>
    {{-- End of Account section --}}

    {{-- User Receipt section --}}
<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h4 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Your Receipts</h4>
        </div>
       <div class="row">
           @forelse ($receipts as $receipt)
               <div class="col-md-4 grey lighten-1 border rounded p-2" style="border: 1px solid white !important;">
                           <img src="{{ asset('storage/receipts/receipt' . $receipt->image) }}" class="responsive-img materialboxed" width="100%" height="300" />
                           <p class=" grey grey-text text-darken-3 pl-5 py-2 font-bold my-2">{{ $receipt->type_name }}</p>
                           <div class="mt-3 row">
                               <div class="col s3 l2">
                                   <p class="p-1 text-sm rounded {{ $receipt->approved ? 'green white-text' : 'red white-text' }}">{{ $receipt->approved ? 'Approved' : 'Pending Approval' }}</p>
                               </div>
                               {{-- ONLY THE ADMIN CAN SEE THIS PART --}}
                               @can('admin')
                                <div class="col s10 l10">
                                    <span onclick="event.preventDefault(); if(confirm('Are you sure?')){ document.getElementById('receipt-update-{{ $receipt->image }}-{{ $receipt->id }}-id').submit() }" class="green-text font-bold" style="cursor: pointer;">{{ $receipt->approved ? '' : 'APPROVE' }}</span>
                                    
                                    <span onclick="event.preventDefault(); if(confirm('Are you sure?')){ document.getElementById('receipt-delete-{{ $receipt->image }}-{{ $receipt->id }}-id').submit() }" class="red-text font-bold" style="cursor: pointer;">DELETE</span>
                                </div>

                                <form id="receipt-update-{{ $receipt->image }}-{{ $receipt->id }}-id" action="{{ route('receipt.update', $receipt) }}" method="POST" style="display: none !important;">
                                    @csrf
                                    @method('PUT')
                                </form>
                                
                                <form id="receipt-delete-{{ $receipt->image }}-{{ $receipt->id }}-id" action="{{ route('receipt.destroy', $receipt) }}" method="POST" style="display: none !important;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                               @endcan
                               {{-- ONLY THE ADMIN CAN SEE THIS PART --}}
                           </div>

               </div>
           @empty
               <p>You don't have any receipt.</p>
           @endforelse
       </div>
    </div>

</div>
    {{-- End of User Receipt section --}}
    

    
{{-- only the admin can see this section --}}
@can('admin')
    {{-- All Receipt section --}}
<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h4 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">All Receipts</h4>
        </div>
        <div class="row">
            @forelse ($receipts as $receipt)
                <div class="col-md-4 grey lighten-1 border rounded p-2" style="border: 1px solid white !important;">
                            <img src="{{ asset('storage/receipts/receipt' . $receipt->image) }}" class="responsive-img materialboxed" width="100%" height="300" />
                            <p class=" grey grey-text text-darken-3 pl-5 py-2 font-bold my-2">{{ $receipt->type_name }}</p>
                            <div class="mt-3 row">
                                <div class="col s3 l2">
                                    <p class="p-1 text-sm rounded {{ $receipt->approved ? 'green white-text font-bold' : 'red white-text' }}">{{ $receipt->approved ? 'Approved' : 'Pending Approval' }}</p>
                                </div>
                                {{-- ONLY THE ADMIN CAN SEE THIS PART --}}
                                @can('admin')
                                 <div class="col s10 l10">
                                     <span onclick="event.preventDefault(); if(confirm('Are you sure?')){ document.getElementById('receipt-update-{{ $receipt->image }}-{{ $receipt->id }}-id').submit() }" class="green-text font-bold" style="cursor: pointer;">{{ $receipt->approved ? '' : 'APPROVE' }}</span>
                                     
                                     <span onclick="event.preventDefault(); if(confirm('Are you sure?')){ document.getElementById('receipt-delete-{{ $receipt->image }}-{{ $receipt->id }}-id').submit() }" class="red-text font-bold" style="cursor: pointer;">DELETE</span>
                                 </div>
 
                                @endcan
                                {{-- ONLY THE ADMIN CAN SEE THIS PART --}}
                            </div>
 
                </div>
            @empty
                <p>You don't have any receipt.</p>
            @endforelse
        </div>
    </div>

</div>
    {{-- End of All Receipt section --}}

@endcan
{{-- END of admin section --}}



@endsection

@section('footerContent')

@endsection
