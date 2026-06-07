<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelFacility extends Model
{
    
    protected $table = 'hotel_facilities';

    protected $fillable = [
        'name',
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }
}
