<?php

namespace App\Http\Controllers\Front\Index;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Booking\Booking;
use App\Models\Contact\Contact;
use App\Models\Service\Service;
use App\Models\Feature\Feature;
use App\Models\Room\Room;
use App\Models\Hotel\Hotel;

use App\Models\Banner\Banner;
use App\Models\Gallery\ImageGallery;
use App\Models\Aboutus\Aboutus;
use App\Models\AboutExplore\AboutExplore;
use App\Models\Testimonial\Testimonial;
use App\Mail\BookingMail;
use Illuminate\Support\Facades\Mail;







use Toastr;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function contactDetail()
    {
        // $data =array(
        //     'contact'=> Contact::find(1),
        //     'cats'=>Category::all(),
        //      'hotel'=>Hotel::find(1)
        // );
        
         return Contact::find(1);
    }



    public function index()
    {   

        $aboutus = Aboutus::where(['deleted_at'=>null,'status'=>'1'])->latest()->first();
        $gallery = ImageGallery::where(['deleted_at'=>null,'status'=>'1'])->latest()->take(6)->get();
        $explore = AboutExplore::where(['deleted_at'=>null,'status'=>'1'])->latest()->first();
        $banners = Banner::where(['deleted_at'=>null,'status'=>'1'])->latest()->get();
        $testimonials = Testimonial::where(['deleted_at'=>null,'status'=>'1'])->latest()->get();
        // dd(Category::with('rooms')->where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get());
        $cats = Category::with('rooms')->where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get();
        $category = Category::where(['deleted_at'=>null,'status'=>'1'])->get();
        $contact = $this->contactDetail();
        return view('front.index',compact('category','explore','cats','banners','contact','aboutus','gallery','testimonials'))->with(['hotel'=>Hotel::find(1)]);
    }

    public function services()
    {
        $contact = $this->contactDetail();
        $cats = Category::where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get();
        $features = Feature::where(['deleted_at'=>null,'status'=>1])->latest()->get();
        $services = Service::where(['deleted_at'=>null,'status'=>1])->latest()->first();
        // dd($services);

        return view('front.services.service',compact('contact','features','services','cats'))->with(['hotel'=>Hotel::find(1)]);
    }

    public function contact()
    {   
        return view('front.contact.contact')->with([
            'contact' => $this->contactDetail(),
            'cats' => Category::where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get(),
            'hotel'=>Hotel::find(1)
                
            ]);
    }

    public function rooms()
    {
        $explore = AboutExplore::where(['deleted_at'=>null,'status'=>'1'])->latest()->first();
        $cats = Category::where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get();
        $contact = $this->contactDetail();
        $hotel=Hotel::find(1);
        $category = Category::where(['deleted_at'=>null,'status'=>'1'])->get();

        return view('front.rooms.rooms',compact('category','cats','explore','contact','hotel'));
    }
    public function gallery()
    {
        $cats = Category::where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get();
        $gallery = ImageGallery::where(['deleted_at'=> null,'status'=>'1'])->latest()->get();
        return view('front.gallery.gallery',compact('gallery','cats'))->with([
            'contact'=> $this->contactDetail(),
            'hotel'=>Hotel::find(1)
        ]);
    }

    public function viewRoom($slug)
    {
        $room = Room::where('slug',$slug)->first();
        $cats = Category::with('rooms')->where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get();

        $contact = $this->contactDetail();
        $hotel = Hotel::find(1);
        $category = Category::where(['deleted_at'=>null,'status'=>'1'])->get();

        // dd($room->categories->id);
        return view('front.rooms.viewroom',compact('category','room','contact','cats','hotel'));
    }

    public function booking(Request $request)
    {
        $this->validate($request,
        [
            'date_arrival'=>'required|date|after_or_equal:today',
            'date_departure'=>'required|date|after:date_arrival',
            'guest_child'=>'nullable|integer',
            'guest_adult'=>'required|integer',
            'room_type'=>'nullable',
            'contact'=>'nullable|integer',
            'email'=>'nullable',
            'price'=>'nullable|integer',
            'day'=>'integer|nullable',
            'payment_type'=>'required|string'

        ]);

        $book = [];
        $book = $request->all();

        if($request->payment_type=='cash'){
            Booking::create($request->all());
            isset($request->email)?Mail::to($request->email)->send(new BookingMail($book)):'';
            Toastr::success('Booking request sent !!');
            return redirect('/');
         } else{
            return redirect('https://esewa.com.np');
         }
    }

    public function bookingDetail(Request $request){
        
        $this->validate($request,
        [
            'date_arrival'=>'required|date|after_or_equal:today',
            'date_departure'=>'required|date|after:date_arrival',
            'guest_child'=>'nullable|integer',
            'guest_adult'=>'required|integer',
            'room_type'=>'nullable',
            'contact'=>'nullable|integer',
            'email'=>'nullable|email',
            'price'=>'nullable|integer',
            'day'=>'integer|nullable'
        ]);
        $book = [];
        $book = $request->all();
        // dd($book['email']);

        $contact = $this->contactDetail();
        $hotel = Hotel::find(1);
        $cats = Category::where(['deleted_at'=>null,'status'=>'1'])->latest()->take(3)->get();
        $category = Category::where(['deleted_at'=>null,'status'=>'1'])->get();

        return view('front.booking.booking-detail',compact('book','hotel','contact','cats','category'));

    }
    
}
