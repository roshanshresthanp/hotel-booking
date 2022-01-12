<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Models\Hotel\Hotel;
use Toastr;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('admin.hotel.edit',compact('hotel'));
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
        $this->validate($request, [
            'name' => 'nullable| string| max:255',
            'description' => 'nullable| string| max:1000',
            'logo' => 'nullable',
            'banner' => 'nullable'
            ]);

            $hotel = Hotel::find($id);
            if($request->hasFile('logo'))
            {
                $FilenameWithExtension1 = $request->file('logo')->getClientOriginalName();
                $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
                $Extension1 = $request->file('logo')->getClientOriginalExtension();
                $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
                $path1 = $request->file('logo')->storeAs('/public/hotel',$FileToStore1);
    
                Storage::delete('public/hotel'.$hotel->logo); 
    
            }
            if($request->hasFile('banner'))
            {
                $FilenameWithExtension2 = $request->file('banner')->getClientOriginalName();
                $Filename2 = pathinfo($FilenameWithExtension2, PATHINFO_FILENAME);
                $Extension2 = $request->file('banner')->getClientOriginalExtension();
                $FileToStore2 = $Filename2.'_'.time().'.'.$Extension2;
                $path2 = $request->file('banner')->storeAs('/public/hotel',$FileToStore2);
    
                Storage::delete('public/hotel/'.$hotel->banner); 
    
            }


            $hotel->name = $request->name;
            $hotel->description = $request->description;
            if($request->hasFile('logo')){
                  
                $hotel->logo = $FileToStore1;
            }
            if($request->hasFile('banner')){
                  
                $hotel->banner = $FileToStore2;
            }
            $hotel->save();

            Toastr::success('Hotel updated');

            return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
