<div class="my-3">

    <div class="rounded-md p-5 login-form-section container" style="background: {{ env('APP_PRIMARY_COLOR') }} !important;">
      <form action="{{ route('register') }}" method="POST" class="form-login-register">
            @csrf
          <div class="row">
            <div class="form-group col-md-6">
                <input type="text" name="first-name" id="first-name" class="form-control rounded pl-3" placeholder="First name *" value="{{ old('first-name') }}" aria-describedby="first-name" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('first-name')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="middle-name" id="middle-name" class="form-control rounded pl-3" placeholder="Middle name" value="{{ old('middle-name') }}" aria-describedby="middle-name" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('middle-name')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="last-name" id="last-name" class="form-control rounded pl-3" placeholder="Last name" value="{{ old('last-name') }}" aria-describedby="last-name" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('last-name')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="username" id="username" class="form-control rounded pl-3" placeholder="Choose username" value="{{ old('username') }}" aria-describedby="username" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('username')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="email" id="email" class="form-control rounded pl-3" placeholder="Email address" value="{{ old('email') }}" aria-describedby="email" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('email')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="phone" id="phone" class="form-control rounded pl-3" placeholder="Phone number" value="{{ old('phone') }}" aria-describedby="phone" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('phone')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <input type="password" name="password" id="password" class="form-control rounded pl-3" placeholder="Enter a password" aria-describedby="password" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('password')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded pl-3" placeholder="Confirm password" aria-describedby="password_confirmation" style="border: 1px solid {{ env('APP_WHITE_COLOR') }} !important;  width: 95% !important;">
                @error('password_confirmation')
                    <span class="red-text">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-block font-weight-bolder btn-large bg-white hover:bg-blue-100" role="button" style="background: {{ env('APP_WHITE_COLOR') }} !important; color: {{ env('APP_PRIMARY_COLOR') }} !important; width: 100% !important;">CREATE ACCOUNT</button>
      </form>

    </div>

</div>
