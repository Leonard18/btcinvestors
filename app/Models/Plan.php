<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'percentage',
        'interval',
	'interval_name',
        'description',
        'duration',
        'background_color',
        'text_color',
    ];
}
