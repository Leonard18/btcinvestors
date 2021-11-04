<div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

    <div class="container-fluid p-5 rounded">
        <div class="row">
            <div class="col-md-5" style="background: {{ env('') }} !important;">
                <h4>Update Password</h4>
                <p class="grey-text">Ensure your account is using a long random password to stay secure.</p>
            </div>
            <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                <form action="">
                  <div class="input-field col s12 l12 m12">
                    <input type="text" id="current_password" class="validate">
                    <label for="current_password">Current Password</label>
                  </div>
                  <div class="input-field col s12 l12 m12">
                    <input type="text" id="new_password" class="validate">
                    <label for="new_password">Current Password</label>
                  </div>
                  <div class="input-field col s12 l12 m12">
                    <input type="text" id="confirm_password" class="validate">
                    <label for="confirm_password">Current Password</label>
                  </div>
                  <div class="col s4 l4 m4 offset-m8 offset-s8 offset-l8">
                      <button class="btn btn-block black white-text">SAVE</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

</div>
