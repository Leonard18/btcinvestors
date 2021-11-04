<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposits';

    protected $fillable = [
        'plan_id',
        'user_id',
        'plan_name',
        'username',
        'investment_amount',
        'plan_interval',
        'plan_percent',
        'expected_amount',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
