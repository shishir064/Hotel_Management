<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addHotel extends Model
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
}
