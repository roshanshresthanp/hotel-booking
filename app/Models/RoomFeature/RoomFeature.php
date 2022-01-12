<?php

namespace App\Models\RoomFeature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Feature\Feature;
use App\Models\Room\Room;

class RoomFeature extends Model
{
    
    use HasFactory;


    protected $table = 'room_features';

    protected $fillable = [
        'room_id', 'feature_id'
    ];


    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    // @return mixed

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
