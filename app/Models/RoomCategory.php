<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    protected $table = 'room_categories';

    protected $fillable = [
        'category_name'
    ];

    public function rooms()
    {
        
        return $this->hasMany(Rooms::class,'category_id');
    }
}
