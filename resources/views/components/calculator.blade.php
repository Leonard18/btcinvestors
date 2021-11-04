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
