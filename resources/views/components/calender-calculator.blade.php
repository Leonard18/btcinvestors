<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        
        <div class="row">
            {{-- calculator section --}}
            <div class="col-md-6 border-right">
                <h4 class="pb-4 underline grey-text">Calculator</h4>
                <div class="my-3">
                    <form action="" class="form">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="amount" id="" placeholder="Enter amount" class="form-control rounded pl-3" style="border: 1px solid {{ env('APP_PRIMARY_COLOR') }} !important;">
                        </div>
                        <div class="form-group">
                          <select class="form-control py-1 pl-3 rounded" name="" id="" style="border: 1px solid {{ env('APP_PRIMARY_COLOR') }} !important;">
                            <option>Select investment plan</option>
                            <option>Bronze</option>
                            <option>Silver</option>
                            <option>Gold</option>
                            <option>Diamond</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-large white-text" style="background: {{ env('APP_PRIMARY_COLOR') }} !important;">CALCULATE</button>
                    </form>
                </div>
            </div>
            {{-- calender section --}}
            <div class="col-md-6">
                <h4 class="pb-4 underline grey-text">Calendar</h4>
            </div>
        </div>

        
    </div>

</div>
