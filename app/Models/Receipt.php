<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'type_name',
        'image',
        'approved',
    ];

    /**
    * User relationship... 
    */
    public function user() {
        return $this->belongsTo(User::class);
    }


}
