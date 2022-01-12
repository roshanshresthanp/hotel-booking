<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Room\Room;
use App\Models\Booking\Booking;
use App\Models\Feedback\Feedback;
use App\Models\Gallery\ImageGallery;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $rooms = Room::where(['deleted_at'=>null,'status'=>1])->get();
        $booking = Booking::where(['deleted_at'=>null])->get();
        $gallery = ImageGallery::where(['deleted_at'=>null,'status'=>1])->get();
        $feedback = Feedback::where(['deleted_at'=>null])->get();

        
        return view('admin.dashboard',compact('rooms','booking','gallery','feedback'));

    }
}
