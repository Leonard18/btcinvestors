@extends('layouts.app')

@section('headerContent')
    <meta name="description" content="{{ config('app.name') }} - Investment Plans">
    <title>{{ config('app.name') }} - Investment Plans</title>
@endsection

@section('page-name')
    Investment Plans
    @section('small-page-name', 'investment-plans')
@endsection

@section('content')

<div class="my-5">

    <div class="container-fluid p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header pb-4 center">
            <div class="row justify-content-between">
                <div class="col-md-10">
                    <h1 class="section-header-text" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Investment Plans</h1>
                </div>
                {{-- only the admin can see this part --}}
			@can('admin')
			<div class="col-md-2 pt-4">


				 <!-- Modal Trigger -->
			{{-- only ther admin can see this button --}}
			@can('admin')
				<a class="waves-effect waves-light btn modal-trigger green darken-2 white-text" href="#modal-plan">Add Plan</a>
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
			@endcan
		{{-- end of the admin part --}}
        <div class="row">

            @forelse ($plans as $plan)
            <div class="col-md-6 col-lg-6">
                <div class="card" style="background: {{ $plan->background_color }}">
                    <div class="card-header center" style="width: 100% !important;">
                        <h1 class="card-title font-weight-bold" style="color: {{ $plan->text_color }} !important;">{{ $plan->name }}</h1>
                    </div>
                    <div class="card-content center" style="color: {{ $plan->text_color }}">
                        <h1 class="price-header">{{ $plan->percentage }}%</h1>
                        <p>paid once every {{ $plan->interval_name }}</p>
                    </div>
                    <div class="card-action center">
                        <!-- Button trigger modal -->
                        <a class="btn-link" data-toggle="modal" data-target="#modelId-{{ $plan->id }}" style="cursor: pointer !important; color: {{ $plan->text_color }};">
                          View details
                        </a>

                        <button class="btn btn-large my-3 btn-block font-weight-bolder" style="background: {{ $plan->text_color }};"><a href="{{ route('make-deposit') }}" style="color: {{ $plan->background_color }}">INVEST NOW</a></button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId-{{ $plan->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">{{ $plan->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            Add rows here
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $('#exampleModal').on('show.bs.modal', event => {
                                var button = $(event.relatedTarget);
                                var modal = $(this);
                                // Use above variables to manipulate the DOM

                            });
                        </script>
                    </div>
                </div>
            </div>

            @empty
                <p>There are no plans on the platform. Create one</p>
            @endforelse


            </div>
        </div>
    </div>


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
                       <th data-field="price">Extras</th>
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
                          <td>{{ $userTran->extras }}</td>
                          <td>{{ $userTran->status ? 'Success' : 'Declined' }}</td>
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




@endsection

@section('footerContent')

@endsection
