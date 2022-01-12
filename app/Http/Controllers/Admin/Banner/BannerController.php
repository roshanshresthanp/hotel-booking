<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Banner\Banner;
use Toastr;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::where(['deleted_at'=>null])->latest()->get();
        // dd($banners);
       return view('admin.banners.index',compact('banners')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable| string| max:255',
            'description' => 'nullable| string| max:255',
            'image' => 'required|image| max:10000'

        ]);

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/banner',$FileToStore1);

            // Storage::delete('public/Images/'.$banner->image);            
        }

        $banner = new Banner();
        $banner->description = $request->description;
        $banner->title = $request->title;
        $banner->status = $request->status;

        if($request->hasFile('image'))
        {
            $banner->image = $FileToStore1;
        }
        $banner->save();
        Toastr::success('Banner added');

        return redirect(route('admin.banners.index'));
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
        $banner = Banner::find($id);
        return view('admin.banners.edit', ['banner' => $banner]);
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
            'title' => 'nullable| string| max:255',
            'description' => 'nullable| string| max:255',
            'image' => 'nullable| image| max:10000'

        ]);

        $banner = Banner::find($id);

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/banner',$FileToStore1);

            Storage::delete('public/banner'.$banner->image);            
        }

        $banner->description = $request->description;
        $banner->title = $request->title;
        $banner->status = $request->status;

        if($request->hasFile('image'))
        {
            $banner->image = $FileToStore1;
        }
        $banner->save();
        Toastr::success('Banner updated');

        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        Storage::delete('public/banner'.$banner->image);            
        $banner->delete();
        
        Toastr::success('Banner Deleted');
        return redirect()->back();
    }
}
