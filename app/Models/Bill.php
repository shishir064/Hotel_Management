<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';

    protected $fillable = [
        'user_id',
        'room_id',
        'total',
        'status',
        'payment_method'
    ];
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
}
