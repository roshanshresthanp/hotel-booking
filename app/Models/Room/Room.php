<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

use App\Models\RoomDetail\RoomDetail;
use App\Models\RoomDetailValue\RoomDetailValues;

use App\Models\Category\Category;
use App\Models\Feature\Feature;
use App\Models\RoomFeature\RoomFeature;


class Room extends Model
{
    use HasFactory; 
    use SoftDeletes;
    use Sluggable;

    

    protected $casts = [
        'detail' => 'array'
        // 'feature_id' => 'array'
    ];

    protected $table = 'rooms';

    protected $fillable = [
        'name','description'

    ]; 


    public function setPropertiesAttribute($detail_value)
{
    $details = [];

    foreach ($detail_value as $array_item) {
        if (!is_null($array_item['detail_id'])) {
            $details[] = $array_item;
        }
    }

    $this->attributes['detail'] = json_encode($details);
}



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }


    public function details()
    {
        return $this->belongsToMany(RoomDetail::class, 'room_detail_values', 'room_id', 'detail_id')->withPivot('detail_value');
    }

    public function roomDetailValues()
    {
        return $this->hasMany(RoomDetailValues::class);
    }


    public function features()
    {
        return $this->belongsToMany(Feature::class,'room_features','room_id','feature_id');
    }
    
    public function roomFeatures()
    {
        return $this->hasMany(RoomFeature::class);
    }


    
}
