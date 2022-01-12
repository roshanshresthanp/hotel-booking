<?php

namespace App\Models\RoomDetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room\Room;


class RoomDetail extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
