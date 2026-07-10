<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedDestinations extends Model
{
    protected $table = 'feature_destinations';

    protected $fillable = [
        'name',
        'city',
        'cover_image',
        'description',
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'destination_id');
    }
}
