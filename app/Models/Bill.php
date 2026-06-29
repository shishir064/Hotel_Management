<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';

    protected $fillable = [
        'room_booking_id',
        'user_id',
        'room_id',
        'total',
        'status',
        'sub_total',
        'vat',
        'payment_method',
        'check_in_date',
        'check_out_date',
    ];
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
