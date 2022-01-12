<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\Index\IndexController;
use App\Http\Controllers\Front\Feedback\FeedbackController;

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Room\RoomController;
use App\Http\Controllers\Admin\Hotel\HotelController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Feature\FeatureController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Booking\BookingController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Aboutus\AboutusController;
use App\Http\Controllers\Admin\AboutExplore\AboutExploreController;
use App\Http\Controllers\Admin\Testimonial\TestimonialController;
use App\Http\Controllers\Admin\RoomDetail\RoomDetailController;




use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/services',[IndexController::class,'services'])->name('service');
Route::get('/rooms',[IndexController::class,'rooms'])->name('room');
Route::get('/gallery',[IndexController::class,'gallery'])->name('gallery');
Route::get('/contact',[IndexController::class,'contact'])->name('contact');
Route::get('/view-room/{slug}',[IndexController::class,'viewRoom'])->name('room.view');



Route::post('/booking',[IndexController::class,'booking'])->name('booking.store');
Route::post('/booking/detail',[IndexController::class,'bookingDetail'])->name('booking.detail');
Route::resource('feedback',FeedbackController::class);

Route::redirect('/home', '/');

Route::get('/booking-confirm',function(){
    return view('emails.booking');
});


Auth::routes();

//     Route::get('/',[IndexController::class,'index'])->name('home.index');


    Route::group(['as'=>'admin.', 'prefix'=>'admin', 'middleware'=>['auth']], function(){

        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
        Route::resource('hotel',HotelController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('rooms',RoomController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('galleries',GalleryController::class);
        Route::resource('features',FeatureController::class);
        Route::resource('contacts',ContactController::class);
        Route::resource('bookings',BookingController::class);
        Route::resource('banners',BannerController::class);
        Route::resource('about-us',AboutusController::class);
        Route::resource('testimonials',TestimonialController::class);
        Route::resource('about-explore',AboutExploreController::class);
        Route::resource('room-details',RoomDetailController::class);
        Route::get('/rooms/featured-status/{id}',[RoomController::class,'featured'])->name('room.featured');





    });

// });









