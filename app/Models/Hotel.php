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
        'destination_id',
        'cover_image',
        'user_id',
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(HotelFacility::class);
    }

    public function rooms(){
        return $this->hasMany(Rooms::class);
    }

    public function destinations(){
        return $this->belongsTo(FeaturedDestinations::class, 'destination_id');
    }

    public function trendingDestination(){
        return $this->belongsTo(TrendingDestinations::class, 'trending_destination_id');
    }
}
