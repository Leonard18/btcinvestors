<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\WithdrawalRequestController;


//Route for creating the role... 
// Route::get('/roles', function() {
	//$admin = Role::create(['name' => 'admin']);
    	//$agent = Role::create(['name' => 'agent']);
    	//$investor = Role::create(['name' => 'investor']);

 	//$adminPermission = Permission::create(['name' => 'admin']);
   	//$agentPermission = Permission::create(['name' => 'agent']);
    	//$investorPermission = Permission::create(['name' => 'investor']);

     // Assign Permission...
    	//$admin->givePermissionTo($adminPermission);
    	//$agent->givePermissionTo($agentPermission);
    	//$investor->givePermissionTo($investorPermission);

	// $user = User::find(1);
	// $user->givePermissionTo('admin');
    // $user->assignRole('admin');



	// return "<h1>Role and Permission have been created.</h1>";



    	// return "<h1>Role and Permission given to admin.</h1>";
// });

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/home', [DashboardController::class, 'index']);
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/policy', [PageController::class, 'policy'])->name('policy');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/plans', [PageController::class, 'plans'])->name('plans');

// Blog section...
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'getSingle'])->where('slug', '[\w\d\-\_]+')->name('blog.single');
Route::post('/blog', [CommentController::class, 'store'])->name('blog.comment');

// Dashboard section
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
    // logout route...
    Route::post('/dashboard', [DashboardController::class, 'logout'])->name('logout');

    Route::get('/investment-plans', [DashboardController::class, 'investmentPlans'])->name('investment-plans');

    Route::get('/security-settings', [DashboardController::class, 'security'])->name('security');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

    // Deposits section...
    Route::get('/make-deposit', [DepositController::class, 'index'])->name('make-deposit');
    Route::post('/make-deposit', [DepositController::class, 'newDeposit'])->name('new-deposit');
    Route::get('/deposits', [DepositController::class, 'deposits'])->name('deposits');
    Route::get('/deposit-history', [DepositController::class, 'depositHistory'])->name('deposit-history');
    Route::view('/invest-now', 'user.make-deposit')->name('invest-now');

    // Deposit activation....
    Route::post('/dashboard/deposit/{id}', [DepositController::class, 'updateUserPlan'])->name('deposit-update');

    //Update user info section...
    Route::post('/settings/country-update', [UserDetailsController::class, 'updateCountry'])->name('country.update');
    Route::post('/settings/state-update', [UserDetailsController::class, 'updateState'])->name('state.update');
    Route::post('/settings/city-update', [UserDetailsController::class, 'updateCity'])->name('city.update');
    Route::post('/settings/zip-code-update', [UserDetailsController::class, 'updateZipCode'])->name('zipcode.update');
    Route::post('/settings/home-address-update', [UserDetailsController::class, 'updateHomeAddress'])->name('home-address.update');
    Route::post('/settings/wallet-address-update', [UserDetailsController::class, 'updateWalletAddress'])->name('wallet-address.update');

    // Referral section.
    Route::get('/referral-link', [UserDetailsController::class, 'referralLink'])->name('referral-link');
    Route::get('/referrals', [UserDetailsController::class, 'referrals'])->name('referrals');

    // Plan resoure section
    Route::resource('/plan', PlanController::class);

    // Withdrawal section
    Route::get('/withdraw', [WithdrawalRequestController::class, 'index'])->name('withdraw');
    Route::post('/withdraw', [WithdrawalRequestController::class, 'store'])->name('withdraw');
    Route::get('/withdrawal-history', [WithdrawalRequestController::class, 'withdrawalHistory'])->name('withdrawal-history');
    Route::post('/approve/{id}', [WithdrawalRequestController::class, 'approve'])->name('approve');

    // Earning History
    Route::get('/earning-history', [TransactionController::class, 'earnings'])->name('earning-history');

    // All Transactions
    Route::get('/all-transactions', [TransactionController::class, 'index'])->name('all-transactions');

    // Transaction resource section...
    Route::resource('/dashboard/transaction', TransactionController::class);

    // post controller...
    Route::resource('dashboard/post', PostController::class);
    Route::resource('dashboard/category', CategoryController::class);
    Route::resource('dashboard/tag', TagController::class);
    Route::resource('dashboard/comment', CommentController::class);

    // Receipt section... 
    Route::resource('/receipt', ReceiptController::class);
    
    // Tickets section...
    Route::resource('/ticket', SupportTicketController::class);

});

Route::get('/support-ticket', [DashboardController::class, 'supportTicket'])->name('support-ticket.index');




// Auth::routes(['verify' => true]);
