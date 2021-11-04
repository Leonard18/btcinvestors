<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <ul class="collection with-header">

            <li class="collection-header">
              <h1>Your Info</h1>
            </li>
            <li class="collection-item"><div>Full Name <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->first_name ?? null }} {{ auth()->user()->last_name ?? null }}</span></div></li>

            <li class="collection-item"><div>Email <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->email }}</span></div></li>

            <li class="collection-item"><div>Referral Link <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->referral_link }}</span></div></li>
            <li class="collection-item"><div>Referral Count <span class="secondary-content" style="font-weight: bolder !important;">{{ Auth::user()->referrals->count() }}</span></div></li>

            <li class="collection-item"><div>Account Status <span class="secondary-content" style="font-weight: bolder !important;">{{ auth()->user()->email_verified_at ? 'Verified' : 'Not verified' }}</span></div></li>

          </ul>
    </div>

</div>
