<?php

namespace App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Room\Room;

class Feature extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'name','description','deleted_at','slug','icon','status'
    ];

    public function sluggable() :array
    {
        return [
            'slug'=> [
                'source'=> 'name'
            ]
        ];
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
    

}
