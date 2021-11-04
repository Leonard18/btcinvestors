@extends('layouts.pages')

@section('headerContent')
   <meta name="description" content="Investment Plans - {{ config('app.name') }}">
   <title>{{ config('app.name') }} - Investment Plans</title>
@endsection

{{-- section for page header --}}
@section('page-name')
    Investment Plans
    {{-- @section('small-page-name', 'investment-plans') --}}
@endsection
{{-- end of section for page header --}}

@section('content')

<div class="my-5">

    <div class="container p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
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

    <section style="background: {{ env('APP_WHITE_COLOR') }}" class="p-5 container">

    </section>

@endsection

@section('footerContent')

@endsection
