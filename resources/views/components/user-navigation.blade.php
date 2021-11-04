<div>

    <!-- Navigation section -->
 <div class="navbar-fixed">
   <nav class="white">
     <div class="nav-wrapper">
       <a href="#" class="brand-logo center" style="color: {{ env('APP_PRIMARY_COLOR') }}">{{ config('app.name') }}</a>
       <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fa fa-bars fa-2x ml-10 black-text mt-13" aria-hidden="true"></i></a>
       <ul class="right mr-20">
         <!-- hide-on-small-only -->
         <li><a href="#"><i class="fas fa-bell black-text font-size-20"></i></a></li>
         <li>

           <div class="black-text">
             <img src="{{ asset("img/user2.png") }}" class="user-img mt-13">
             <li class="name black-text ml-4 hide-on-med-and-down">{{ auth()->user()->username ?? null }}</li>
             <li class="dropdown-section"><a href="#" class="black-text" id="userDrop"><i class="fa fa-caret-down font-size-20 dropdown-trigger-btn" aria-hidden="true"></i></a>

              <!-- dropdown content section -->
              <ul class="user-content white pl-20" id="userContent" style="border: 2px solid lightgray !important;">
                  {{-- user personal information --}}

                  <li class="{{ Route::is('profile') ? 'site-blue-bg' : '' }}">
                    <a class="text-darken-1 {{ Route::is('profile') ? 'white-text' : 'grey-text' }}" href="{{ route('profile') }}"><i class="fas fa-user mr-3"></i> {{ __('Profile') }}</a>
                   </li>

                  <li class="{{ Route::is('settings') ? 'site-blue-bg' : '' }}">
                    <a class="text-darken-1 {{ Route::is('settings') ? 'white-text' : 'grey-text' }}" href="{{ route('settings') }}"><i class="fas fa-cogs mr-3"></i> {{ __('Settings') }}</a>
                </li>


                  <li class="{{ Route::is('security') ? 'site-blue-bg' : '' }}">
                      <a class="text-darken-1 {{ Route::is('security') ? 'white-text' : 'grey-text' }}" href="{{ route('security') }}"><i class="fas fa-user-lock mr-3"></i> {{ __('Security') }}</a>
                    </li>

                 <!-- logout button section -->
                  <li class="mt-30">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="red-text text-darken-1" href=""><i class="fas fa-sign-out-alt mr-3"></i> Logout</a>
                    </li>
            </ul>

           </li>
           </div>
         </li>
       </ul>
       <!-- side nav section -->
       <ul class="sidenav sidenav-fixed black-text" id="slide-out">
         <div class="center black-text mt-30 pb-30">
           <h4 class="site-name center mb-17" style="color: {{ env('APP_PRIMARY_COLOR') }}">{{ config('app.name') }}</h4>
           <div classs="row justify-content-center">
               <div class="col-md-10">
                <image src="{{ asset("img/user2.png") }}" class="ml-30">
               </div>
           </div>
           <div class="user-info mt-20 center">
             <h6>{{ auth()->user()->first_name ?? null }} {{ auth()->user()->last_name ?? null }}</h6>
             <h6>{{ auth()->user()->email ?? null }}</h6>
           </div>
         </div>
         <hr class="mb-20">

         <!-- sidenav link section -->

         {{-- Dashboard link --}}
         <li class="{{ Route::is('dashboard') ? 'site-blue-bg' : '' }}">
            <a class="text-darken-1 {{ Route::is('dashboard') ? 'white-text' : 'grey-text' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-list mr-3"></i> Dashboard
            </a>
        </li>

        {{-- Investment plans link --}}
         <li class="{{ Route::is('investment-plans') ? 'site-blue-bg' : '' }}">
            <a class="text-darken-1 {{ Route::is('investment-plans') ? 'white-text' : 'grey-text' }}" href="{{ route('investment-plans') }}">
                <i class="fas fa-paper-plane mr-3"></i> Investment Plans
            </a>
        </li>

        {{-- Invest now link --}}
         <li class="{{ Route::is('invest-now') ? 'site-blue-bg' : '' }}">
            <a class="text-darken-1 {{ Route::is('invest-now') ? 'white-text' : 'grey-text' }}" href="{{ route('invest-now') }}">
                <i class="fas fa-money-bill mr-3"></i> Invest Now
            </a>
        </li>

         <!-- deposit section -->
         <li class="black-text text-bold text-darken-4 grey lighten-5 pl-10 pt-3 pb-3 mt-">DEPOSIT SECTION</li>

         <li class="{{ Route::is('make-deposit') ? 'site-blue-bg' : '' }}">
            <a class="text-darken-1 {{ Route::is('make-deposit') ? 'white-text' : 'grey-text' }}" href="{{ route('make-deposit') }}"><i class="fas fa-money-bill mr-3"></i> Make Deposit</a>
         </li>

         <li class="{{ Route::is('deposits') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('deposits') ? 'white-text' : 'grey-text' }}" href="{{ route('deposits') }}"><i class="fas fa-coins mr-3"></i> Your Deposits</a>
        </li>
        <li class="{{ Route::is('receipt.index') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('receipt.index') ? 'white-text' : 'grey-text' }}" href="{{ route('receipt.index') }}"><i class="fa fa-book mr-3"></i> Submit Receipt</a>
        </li>
         {{-- only the admin can see this part --}}
		@can('admin')
				<li class="{{ Route::is('deposit-history') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('deposit-history') ? 'white-text' : 'grey-text' }}" href="{{ route('deposit-history') }}"><i class="fas fa-list-ol mr-3"></i> Deposits History</a>
        </li>
		@endcan
	{{-- end of such section --}}
         <!-- End of Deposit section -->


         <!-- earning section -->
         <li class="black-text text-bold grey lighten-5 pl-10 pt-3 pb-3">EARNING SECTION</li>

         <li class="{{ Route::is('earning-history') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('earning-history') ? 'white-text' : 'grey-text' }}" href="{{ route('earning-history') }}"><i class="fas fa-money-bill mr-3"></i> Earning History</a>
         </li>
         <li class="{{ Route::is('all-transactions') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('all-transactions') ? 'white-text' : 'grey-text' }}" href="{{ route('all-transactions') }}"><i class="fas fa-list-ol mr-3"></i>All Transactions</a>
         </li>
         <!-- end earning section -->


         <!-- withdrawal section -->
         <li class="black-text text-bold grey lighten-5 pl-10 pt-3 pb-3">Withdrawal section</li>

         <li class="{{ Route::is('withdraw') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('withdraw') ? 'white-text' : 'grey-text' }}" href="{{ route('withdraw') }}"><i class="fas fa-money-check-alt mr-3"></i> Withdraw</a>
         </li>
         <li class="{{ Route::is('withdrawal-history') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('withdrawal-history') ? 'white-text' : 'grey-text' }}" href="{{ route('withdrawal-history') }}"><i class="fas fa-money-check mr-3"></i> Withdrawal History</a>
         </li>
         <!-- end of withdrawal section -->


         <!-- referral section -->
         <li class="black-text text-bold grey lighten-5 pl-10 pt-3 pb-3">REFERRAL SECTION</li>

         <li class="{{ Route::is('referral-link') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('referral-link') ? 'white-text' : 'grey-text' }}" href="{{ route('referral-link') }}"><i class="fas fa-link mr-3"></i> Referral link</a>
        </li>
         <li class="{{ Route::is('referrals') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('referrals') ? 'white-text' : 'grey-text' }}" href="{{ route('referrals') }}"><i class="fas fa-user-check mr-3"></i> Your Referrals</a>
        </li>
         <!-- end of referral section -->
         

		{{-- only the admin can add post to the website --}}
			@can('admin')
				<!-- Post section -->
         <li class="black-text text-bold grey lighten-5 pl-10 pt-3 pb-3">POST SECTION</li>

         <li class="{{ Route::is('post.index') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('post.index') ? 'white-text' : 'grey-text' }}" href="{{ route('post.index') }}"><i class="fas fa-link mr-3"></i> All Posts</a>
        </li>
         <li class="{{ Route::is('post.create') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('post.create') ? 'white-text' : 'grey-text' }}" href="{{ route('post.create') }}"><i class="fas fa-tasks mr-3"></i>  Add New Post</a>
        </li>
        <li class="{{ Route::is('category.index') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('category.index') ? 'white-text' : 'grey-text' }}" href="{{ route('category.index') }}"><i class="fas fa-list-alt mr-3"></i>  Categories</a>
        </li>
        <li class="{{ Route::is('tag.index') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('tag.index') ? 'white-text' : 'grey-text' }}" href="{{ route('tag.index') }}"><i class="fas fa-tags mr-3"></i>  Tags</a>
        </li>
        <li class="{{ Route::is('comment.index') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('comment.index') ? 'white-text' : 'grey-text' }}" href="{{ route('comment.index') }}"><i class="fas fa-comments mr-3"></i>  Comments</a>
        </li>
         <!-- end of Post section -->
			@endcan
		{{-- end of this section --}}



         <!-- account section -->
         <li class="black-text text-bold grey lighten-5 pl-10 pt-3 pb-3">ACCOUNT SECTION</li>

         <li class="{{ Route::is('profile') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('profile') ? 'white-text' : 'grey-text' }}" href="{{ route('profile') }}"><i class="fas fa-user mr-3"></i> {{ __('Profile') }}</a>
        </li>

         <li class="{{ Route::is('settings') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('settings') ? 'white-text' : 'grey-text' }}" href="{{ route('settings') }}"><i class="fas fa-cogs mr-3"></i> {{ __('Settings') }}</a>
        </li>
         <li class="{{ Route::is('security') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('security') ? 'white-text' : 'grey-text' }}" href="{{ route('security') }}"><i class="fas fa-user-lock mr-3"></i> {{ __('Security') }}</a>
        </li>
         <!-- end of account section -->


         <!-- support section -->
         <li class="black-text text-bold grey lighten-5 pl-10 pt-3 pb-3">SUPPORT SECTION</li>

         <li class="{{ Route::is('support-ticket.index') ? 'site-blue-bg' : '' }}">
             <a class="text-darken-1 {{ Route::is('support-ticket.index') ? 'white-text' : 'grey-text' }}" href="{{ route('support-ticket.index') }}"><i class="fas fa-comment mr-3"></i> Support Center</a>
        </li>

        {{-- only the4 admin can see this part of the submitted tickets --}}
        @can('admin')
            <li class="{{ Route::is('ticket.index') ? 'site-blue-bg' : '' }}"><a class="text-darken-1 {{ Route::is('ticket.index') ? 'white-text' : 'grey-text' }}" href="{{ route('ticket.index') }}"><i class="fas fa-comments mr-3"></i> Tickets</a></li>
        @endcan
         
         <!-- end of support section -->


         <li>
           <a href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();" class="red-text darken-3 margin-top mt-5">Logout <i class="fa fa-sign-out-alt ml-3"></i>
           </a>

         </li>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>


       </ul>
     </div>
   </nav>
 </div>
 <!-- End of Navigation section -->

</div>
