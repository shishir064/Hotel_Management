<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomMainFacility extends Model
{
    protected $table = 'room_main_facilities';

    protected $fillable = [
        'name',
    ];
}
