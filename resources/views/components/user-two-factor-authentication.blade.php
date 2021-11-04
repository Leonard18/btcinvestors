<div class="my-5" style="background: {{ env('APP_GREY_HEADER_COLOR') }} !important;">

    <div class="container-fluid p-5 rounded">
        <div class="row">
            <div class="col-md-5" style="background: {{ env('') }} !important;">
                <h4>Two Factor Authentication</h4>
                <p class="grey-text">Add additional security to your account using two factor authentication.</p>
            </div>
            <div class="col-md-7 rounded p-4" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
                @if (! auth()->user()->two_factor_secret)
                    <h5>You have not enabled two factor authentication.</h5>
                    <p>When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application. </p>
                    <div class="row">
                        <div class="col s4 m4 l4">
                            <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn black white-text">ENABLE</button>
                            </form>
                        </div>
                    </div>

                @else 
                    <h5>Two factor authentication is enabled.</h5>
                    <p>Two factor authentication is enabled on your account. Please scan the following QR code into your phone authenticator application. Login with your secret keys or code from your preferred Authenticator application. </p>

                    {{-- QR code section --}}
                <div class="py-4">
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}

                    <p class="pt-2">Please store these recovery codes in a secured location.</p> <br>
                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                        {{ trim($code) }} <br>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col s4 m4 l4">
                        <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn black white-text">DISABLE</button>
                        </form>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>

</div>
