<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Booking extends Model
{
    use SoftDeletes;
    use HasFactory;
        protected $table ='bookings';
        protected $fillable = ['date_arrival','date_departure','guest_child','guest_adult','room_type','price','day','contact','email'];
        protected $guarded = ['id'];


}
