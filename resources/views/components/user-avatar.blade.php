<div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

    <div class="container-fluid p-5 rounded">
        <div class="row">
            <div class="col-md-5" style="background: {{ env('') }} !important;">
                <h4>Profile Information</h4>
                <p class="grey-text">Update your account's profile information and email address.</p>
            </div>
            <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                <form action="">
                  <div class="input-field col s12 l12 m12">
                    <input type="text" id="first_name" class="validate" value="{{ auth()->user()->first_name }} {{ auth()->user()->middle_name ?? '' }}  {{ auth()->user()->last_name }}" readonly>
                    <label for="first_name">Name</label>
                  </div>
                  <div class="input-field col s12 m12 l12">
                    <input type="email" id="email" class="validate" value="{{ auth()->user()->email }}" readonly>
                    <label for="email">Email</label>
                  </div>
                  <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                      <button class="btn btn-block black white-text">SAVE</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

</div>
