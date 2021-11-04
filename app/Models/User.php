<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use App\Models\Post;
use App\Models\Wallet;
use App\Models\History;
use Illuminate\Support\Str;
use App\Models\WithdrawalRequest;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Petrmission;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'username',
        'email',
        'referrer_id',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relationship  between the user and deposit...
     */
    public function deposits() {
        return $this->hasMany(Deposit::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function wallet() {
        return $this->hasOne(Wallet::class);
    }


    /**
     * App the referral link to the user model...
     * App\Models\User $user
     */
    protected $appends = ['referral_link'];

    /**
     * Setup the relationship...
     * App\Models\User $user
     */
    public function referrer() {
        return $this->belongsTo(User::class,'referrer_id', 'id');
    }

    /**
     * Setup the relationship...
     * App\Models\User $user
     */
    public function referrals() {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    /**
     * Get the referral_link attribute
     */
    public function getReferralLinkAttribute() {
        return $this->referral_link = route('register', ['ref_id' =>
        $this->username]);
    }



    /**
     * Set up the relationship...
     */
    public function histories() {
        return $this->hasMany(History::class);
    }

    /**
     * Set up the relationship...
     */
    public function withdrawalrequests() {
        return $this->hasMany(WithdrawalRequest::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * User and receipt relationship...
     */
    public function receipts() {
        return $this->hasMany(Receipt::class);
    }

}
