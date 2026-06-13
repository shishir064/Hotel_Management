<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function roomBookings()
    {
        return $this->hasMany(RoomBooking::class);
    }
    public function getInitialsAttribute()
{
    return collect(explode(' ', trim($this->name)))
        ->map(fn($word) => strtoupper(substr($word, 0, 1)))
        ->take(2)
        ->implode('');
}
}
