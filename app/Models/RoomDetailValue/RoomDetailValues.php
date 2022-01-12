<?php

namespace App\Models\RoomDetailValue;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RoomDetail\RoomDetail;
use App\Model\Room\Room;

class RoomDetailValues extends Model
{
    use HasFactory;

    protected $table = 'room_detail_values';

    protected $fillable = [
        'room_id', 'detail_id', 'detail_value'
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }

    // @return mixed

    public function details()
    {
        return $this->belongsTo(RoomDetail::class);
    }
    
}
