<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrendingDestinations extends Model
{
    protected $table = 'trending_destinations';

    protected $fillable = [
        'name',
        'city',
        'cover_image',
        'description',
    ];
}
