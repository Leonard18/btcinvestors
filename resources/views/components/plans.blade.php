<div class="my-5">

    <div class="container-fluid p-5" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header pb-4 center">
            <h1 class="section-header-text" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Investment Plans</h1>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-6">
                <div class="card blue">
                    <div class="card-header center" style="width: 100% !important;">
                        <h1 class="card-title font-weight-bold" style="color: {{ env('APP_WHITE_COLOR') }} !important;">SILVER</h1>
                    </div>
                    <div class="card-content center white-text">
                        <h1 class="price-header">71%</h1>
                        <p class="white-text">Monthly</p>
                    </div>
                    <div class="card-action center">
                        <!-- Button trigger modal -->
                        <a class="btn-link blue-grey-text text-darken-4" data-toggle="modal" data-target="#modelId" style="cursor: pointer !important;">
                          View details
                        </a>

                        <button class="btn btn-large white blue-text my-3 btn-block font-weight-bolder">INVEST NOW</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
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

            <div class="col-md-6 col-lg-6">
                <div class="card blue-grey">
                    <div class="card-header center" style="width: 100% !important;">
                        <h1 class="card-title font-weight-bold" style="color: {{ env('APP_WHITE_COLOR') }} !important;">BRONZE</h1>
                    </div>
                    <div class="card-content center white-text">
                        <h1 class="price-header">31%</h1>
                        <p class="white-text">Weekly</p>
                    </div>
                    <div class="card-action center">
                        <!-- Button trigger modal -->
                        <a class="btn-link blue-grey-text text-darken-4" data-toggle="modal" data-target="#modelId" style="cursor: pointer !important;">
                          View details
                        </a>

                        <button class="btn btn-large white blue-grey-text my-3 btn-block font-weight-bolder">INVEST NOW</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
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

            <div class="col-md-6 col-lg-6">
                <div class="card gold">
                    <div class="card-header center" style="width: 100% !important;">
                        <h1 class="card-title font-weight-bold" style="color: {{ env('APP_WHITE_COLOR') }} !important;">GOLD</h1>
                    </div>
                    <div class="card-content center white-text">
                        <h1 class="price-header">91%</h1>
                        <p class="white-text">Monthly</p>
                    </div>
                    <div class="card-action center">
                        <!-- Button trigger modal -->
                        <a class="btn-link blue-grey-text text-darken-4" data-toggle="modal" data-target="#modelId" style="cursor: pointer !important;">
                          View details
                        </a>

                        <button class="btn btn-large white gold-text my-3 btn-block font-weight-bolder">INVEST NOW</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
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

            <div class="col-md-6 col-lg-6">
                <div class="card green darken-2">
                    <div class="card-header center" style="width: 100% !important;">
                        <h1 class="card-title font-weight-bold" style="color: {{ env('APP_WHITE_COLOR') }} !important;">DIAMOND</h1>
                    </div>
                    <div class="card-content center white-text">
                        <h1 class="price-header">131%</h1>
                        <p class="white-text">Monthly</p>
                    </div>
                    <div class="card-action center">
                        <!-- Button trigger modal -->
                        <a class="btn-link blue-grey-text text-darken-4" data-toggle="modal" data-target="#modelId" style="cursor: pointer !important;">
                          View details
                        </a>

                        <button class="btn btn-large white green-text text-darken-2 my-3 btn-block font-weight-bolder">INVEST NOW</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
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
            </div>
        </div>
    </div>

</div>
