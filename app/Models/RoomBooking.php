<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $table = 'room_booking';

    protected $fillable = [
        'room_id',
        'guest_name',
        'email',
        'phone',
        'booked_date',
        'check_in',
        'check_out',
        'adults',
        'children',
        'total_price',
        'status',
        'user_id'
        
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    Public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'room_type');
    }
}
