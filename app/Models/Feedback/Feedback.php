<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'feedback';
    protected $fillable = ['id','name','email','message','subject'];
}
