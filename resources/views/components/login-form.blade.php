<div class="my-3">

    <div class="rounded-md p-4 login-form-section container" style="background: {{ env('APP_PRIMARY_COLOR') }} !important;">
       <div class="row justify-content-center center">
           <div class="col-md-10">
            <form action="{{ route('login') }}" method="POST" class="form-login-register pt-3">
                @csrf
                <div class="form-group">
                  <input type="text" name="email" id="email" class="form-control rounded pl-3 border-white @error('email') border-red @enderror" placeholder="Email/Username" value="{{ old('email') }}" style="width: 95% !important;">
                  @error('email')
                      <span class="red-text">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control rounded pl-3 @error('password') border-red @enderror" placeholder="Password" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                  @error('password')
                    <span class="red-text">{{ $message }}</span>
                  @enderror
                </div>

                {{-- button section --}}
                <button type="submit" class="btn btn-block font-weight-bolder btn-large bg-white hover:bg-blue-100" role="button" style="background: {{ env('APP_WHITE_COLOR') }} !important; color: {{ env('APP_PRIMARY_COLOR') }} !important; width: 100% !important;">Log In</button>
            </form>

            {{-- forgot password link section --}}
            <div class="row mt-20">
                <div class="col m6 s6">
                    <a href="{{ route('password.request') }}" class="grey-text">Forgot Password</a>
                </div>
                <div class="col m6 s6">
                    <a href="{{ route('register') }}" class="grey-text">Sign Up</a>
                </div>
            </div>

           </div>
       </div>
    </div>

</div>
