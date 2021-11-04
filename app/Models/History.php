<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
        'status',
        'date',
    ];

    /**
     * Set up the relationship...
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
