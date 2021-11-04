<div class="my-5">
    <section class="container-fluid p-5" style="background: {{ env('APP_SECONDARY_COLOR') }} !important;">
        <div class="container">
            <div class="section-header center pb-3">
                <h1 style="color: {{ env('APP_TEAL_COLOR') }} !important;">How It Works</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h1><i class="fa fa-user-plus" aria-hidden="true" style="color: {{ env('APP_PRIMARY_COLOR') }}"></i></h1>
                    <h3>Create Account</h3>
                    <p>Having an account on our platform will help you to keep track your investments.</p>
                </div>
                <div class="col-md-4">
                    <h1><i class="fa fa-check-square" aria-hidden="true" style="color: {{ env('APP_PRIMARY_COLOR') }}"></i></h1>
                    <h3>Verify your Email</h3>
                    <p>To allow full access to your account, you will need to verify your email address.</p>
                </div>
                <div class="col-md-4">
                    <h1><i class="fa fa-money-bill" aria-hidden="true" style="color: {{ env('APP_PRIMARY_COLOR') }}"></i></h1>
                    <h3>Invest and Cashout</h3>
                    <p>No more limitations on your account. Invest any amount and start cashing out. Request withdrawal anytime. Its that easy.</p>
                </div>
            </div>
            {{-- get started button --}}
            <button class="btn btn-block btn-large teal darken-1 my-3">
                <a href="{{ route('investment-plans') }}" class="white-text font-weight-bolder">GET STARTED</a>
            </button>
        </div>
    </section>
</div>
