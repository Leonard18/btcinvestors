<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Account Summary</h3>
        </div>
       <div class="row">
            <!-- Investment -->
        <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card  blue darken-2 white-text py-3">
            <h1 class="center"><span style="text-decoration: line-through !important;">N</span> <br> {{ $userWallets[0]->deposit }}</h1>
            <h4 class="center">Deposits</h4>
            </div>
          </div>

          <!-- Earned -->
          <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card  purple darken-2 white-text py-3">
            <h1 class="center"><span style="text-decoration: line-through !important;">N</span> <br>  10010023</h1>
            <h4 class="center">Invested</h4>
            </div>
          </div>

          <!-- Commisions -->
          <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card gold darken-2 white-text py-3">
            <h1 class="center"><span style="text-decoration: line-through !important;">N</span> <br>  10010023</h1>
            <h4 class="center">Earnings</h4>
            </div>
          </div>

          <!-- Withdrawn -->
          <div class="col-md-3 col-sm-6 col-lg-3">
            <div class="card green darken-2 white-text py-3">
            <h1 class="center"><span style="text-decoration: line-through !important;">N</span> <br>  10010023</h1>
            <h4 class="center">Withdrawable</h4>
            </div>
          </div>
       </div>
    </div>

</div>
