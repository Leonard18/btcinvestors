<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>{{ config('app.name') }} - Home</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('headerContent')
</head>
<body style="background: {{ env('APP_BODY_COLOR') }} !important;">

    <x-navigation />

    <x-slideshow />
    <x-welcome-section />

    <div class="my-5">

        <div class="container-fluid p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <h2 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Investment Plans           </h2>
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


    {{-- <x-plans /> --}}


    {{-- <x-calculator :plans="$plans" /> --}}

    <div class="my-5">

        <section class="container p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
            <div class="row">
               <div class="col-md-6">
                   <h1 class="pb-2" style="color: {{ env('APP_PRIMARY_COLOR') }}">Calculate Your Investment.</h1>
                    <p>Know how much you will earn on any amount you invest.</p>
                    <p>We are always here to clerify any doubts and to answer any questions that you may have.</p>
               </div>
               <div class="col-md-5 offset-md-1 center">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" class="form-control rounded" name="" id="" placeholder="Enter amount" style="border: 2px solid {{ env('APP_PRIMARY_COLOR') }} !important; height: 40px !important;">
                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                            </div>
                        </div>
                        <div class="col-md-12 m-2">
                            <div class="form-group">
                                <select class="form-control rounded p-1" name="" id="" style="border: 2px solid {{ env('APP_PRIMARY_COLOR') }} !important; height: 40px !important;">
                                  <option selected disabled>Select investment plan</option>
                                  @forelse ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                  @empty

                                  @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-block btn-large white-text font-weight-bold" style="background: {{ env('APP_PRIMARY_COLOR') }} !important;">CALCULATE</button>
                    </div>
               </div>
            </div>
        </section>

    </div>



    <x-credibility-section />
    <x-choose-us />
    <x-testimonials />
    <x-badges-section />


    <x-footer />

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('footerContent')
</body>
</html>
