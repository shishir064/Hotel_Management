<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';

    public function category(){
        
        return $this->belongsTo(RoomCategory::class,'category_id');
    }
}
