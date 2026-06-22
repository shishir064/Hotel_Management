<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'room_no',
        'hotel_id',
        'room_type',
        'room_status',
        'room_price',
        'room_main_facility',
        'room_Amenity',
        'discount',
    ];

    public function mainFacilities()
    {
        return $this->belongsToMany(
            RoomMainFacility::class,
            'room_main_facility_rooms', // ✅ your new pivot table
            'room_id',                  // FK for rooms
            'room_main_facility_id'     // FK for facilities
        );
    }

    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'room_type');
    }

    public function amenities()
    {
        return $this->belongsToMany(
            RoomMainFacility::class,
            'room_room_amenity', // ✅ your new pivot table
            'room_id',                  // FK for rooms
            'room_amenity_id'     // FK for facilities
        );
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function bookings()
    {
        return $this->hasMany(RoomBooking::class);
    }
}
