<?php

namespace App\Models;
use App\Models\Facilities;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $fillable = [
        'hotel_name',
        'email',
        'description',
        'phone',
        'address',
        'city',
        'country',
        'star_rating',
        'cover_image',
    ];

    // public function rooms()
    // {
    //     return $this->hasMany(Room::class);
    // }

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function facilities()
{
    return $this->belongsToMany(HotelFacility::class);
}
}
