<?php

namespace App\Http\Controllers\Admin\Room;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Feature\Feature;
use App\Models\RoomDetail\RoomDetail;
use App\Models\Room\Room;
use Illuminate\Support\Facades\Storage;
use App\Models\RoomDetailValue\RoomDetailValues;

use Toastr;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats =     Category::all();
        $features = Feature::all();
        $room_detail = RoomDetail::where('deleted_at',null)->get();
        $details = RoomDetailValues::where('deleted_at',null)->get();
        $rooms = Room::where('deleted_at',null)->latest()->get();
        return view('admin.rooms.index',compact('cats','features','rooms','details','room_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cats = Category::where('deleted_at',null)->get();
        $features = Feature::where('deleted_at',null)->get();
        $details = RoomDetail::where('deleted_at',null)->get();
        return view('admin.rooms.create',compact('cats','features','details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        
        $this->validate($request,
        [
            'name'=>'required|max:255|unique:rooms',
            'price'=>'nullable|integer',
            'category_id'=>'required',
            'image.*' => 'nullable|max:10000'

        ]);
        
        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $file)
            {
                $FilenameWithExtension1 = $file->getClientOriginalName();
                $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
                $Extension1 = $file->getClientOriginalExtension();
                $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
                $path1 = $file->storeAs('/public/rooms',$FileToStore1);
                $data[] = $FileToStore1; 
            }           
        }
        if($request->hasFile('featured_image')){
                $FilenameWithExtension2 = $request->file('featured_image')->getClientOriginalName();
                $Filename2 = pathinfo($FilenameWithExtension2, PATHINFO_FILENAME);
                $Extension2 = $request->file('featured_image')->getClientOriginalExtension();
                $FileToStore2 = $Filename2.'_'.time().'.'.$Extension2;
                $path2 = $request->file('featured_image')->storeAs('/public/rooms',$FileToStore2);
        }
        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->status = $request->status;
        $room->featured = $request->featured;
        $room->category_id = $request->category_id;
        // $room->price = $request->price;
        $room->detail = $request->detail;   
        
        if($request->hasFile('image'))
        {
            $room->image = json_encode($data);
        }
        if($request->hasFile('featured_image'))
        {
            $room->featured_image = $FileToStore2;
        }
        $room->save();
        // $room->roomDetailValues()->createMany($request->detail_id);
        

        // features
        if($request->has('feature_id'))
        {
            $feat = $request->feature_id;
            $room = Room::find($room->id);

            foreach($feat as $feature){
                $room->features()->attach($feature); //Many to Many 
                $room->save();
            }
        }

        Toastr::success('Room added');
        return redirect(route('admin.rooms.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        $cats = Category::all();
        $features = Feature::all();
        // dd($room);
        return view('admin.rooms.show',compact('room','cats','features'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $cats = Category::where(['status'=>'1','deleted_at'=>null])->get(); 
        $features = Feature::all();
        $details = RoomDetail::where('deleted_at',null)->get();

        return view('admin.rooms.edit',compact('room','cats','features','details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
         $this->validate($request,
        [
            'name'=>'required|max:255',
            // 'detail_id'=>'required'
        ]);
        $room =Room::find($id);

        // if($request->has('feature_id'))
        // {
            $feat = $request->feature_id;
            $room = Room::find($room->id);
                $room->features()->detach();
               //Many to Many 
                $room->features()->attach($feat); 
                $room->save();
            
        // }
        

        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $file)
            {
                $FilenameWithExtension1 = $file->getClientOriginalName();
                $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
                $Extension1 = $file->getClientOriginalExtension();
                $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
                $path1 = $file->storeAs('/public/rooms',$FileToStore1);
                if(isset($room->image)){
                    foreach(json_decode($room->image) as $img)
                    Storage::delete('public/rooms/'.$img);
                }
                
                $data[] = $FileToStore1; 
                
            }       
        }

        if($request->hasFile('featured_image')){

            $FilenameWithExtension2 = $request->file('featured_image')->getClientOriginalName();
            $Filename2 = pathinfo($FilenameWithExtension2, PATHINFO_FILENAME);
            $Extension2 = $request->file('featured_image')->getClientOriginalExtension();
            $FileToStore2 = $Filename2.'_'.time().'.'.$Extension2;
            $path2 = $request->file('featured_image')->storeAs('/public/rooms',$FileToStore2);
            Storage::delete('public/rooms/'.$room->featured_image);  
        }

    if($request->has('detail'))
    {
        $details = [];
        foreach ($request->detail as $array_item) {
            if (!is_null($array_item['detail_value'])) {
                $details[] = $array_item;
            }
        }   
        $room->detail = $details;
    }
        $room->name = $request->name;
        // $room->price = $request->price;
        $room->description = $request->description;
        $room->status = $request->status;
        $room->featured = $request->featured;
        if($request->has('category_id')){
            
            $room->category_id = $request->category_id;

        }
        $room->name = $request->name;   

        if($request->hasFile('image'))
        {
            $room->image = json_encode($data);
        }
        if($request->hasFile('featured_image'))
        {
            $room->featured_image = $FileToStore2;
        }

        $room->save();
        Toastr::success('Room updated');
        return redirect(route('admin.rooms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        Storage::delete('public/rooms/'.$room->featured_image);
        if(isset($room->image)){

            foreach(json_decode($room->image) as $img)
            Storage::delete('public/rooms/'.$img);
        }

        Toastr::success('Rooms Deleted');
        return redirect()->back();
    }

        public function featured($id){
            // dd($id);
            
            $room = Room::find($id);
            if($room->featured == 0)
            {
                $room->featured = 1;
            }
            else
            {
                $room->featured = 0;
            }
            $room->save();
            Toastr::success('Featured status changes');
            return redirect()->back();
        
            
        }
}
