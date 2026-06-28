<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomServices extends Model
{
    protected $table = 'room_services';

    protected $fillable = [
        'name',
        'price',
    ];
}
