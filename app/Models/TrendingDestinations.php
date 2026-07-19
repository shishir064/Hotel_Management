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

    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'trending_destination_id');
    }
}
