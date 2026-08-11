<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'user_id',
        'hotel_name',
        'logo',
        'phone',
        'email',
        'address',
    ];
}
