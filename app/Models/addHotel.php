<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addHotel extends Model
{
    protected $table = 'hotel';

    protected $fillable = [
        'user_id',
        'hotel_name',
        'phone',
        'hotel_address',
        'city',
    ];
}
