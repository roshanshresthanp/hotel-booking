<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery\ImageGallery;
use Toastr;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgs = ImageGallery::where('deleted_at',null)->latest()->get();
        return view ('admin.galleries.index',compact('imgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'description'=>'nullable',
            'image'=>'nullable',
            'status'=>'nullable'
        ]);


        if ($files = $request->file('image')) {
            foreach($files as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $profileImg = time().".".$profileImage;
                $img->storeAs('/public/gallery/image', $profileImg);
    
                // Save In Database
                $images= new ImageGallery();
                $images->image = $profileImg;
                $images->description = $request->description;
                $images->status = $request->status;
                $images->save();
            }
          }

          Toastr::success('Image added');
          return redirect(route('admin.galleries.index'));
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
        $img = ImageGallery::find($id);
        return view('admin.galleries.edit',compact('img'));
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
        $this->validate($request,
        [
            'description'=>'nullable',
            // 'image'=>'nullable|mimes:jpg,jpeg,png',
            'image.*' => 'image|max:10000|required',
            'status'=>'nullable'
        ]);

        $images =ImageGallery::find($id);
        // dd($request->image);
        if ($request->hasFile('image')) {
                // Upload Orginal Image
                $profileImage =$request->file('image')->getClientOriginalName();
                $profileImg = time().".".$profileImage;
                $request->file('image')->storeAs('/public/gallery/image', $profileImg);
    
                Storage::delete('public/gallery/image/'.$images->image);
                $images->image = $profileImg;
            }
                    $images->description = $request->description;
                    $images->status = $request->status;
                    $images->save();

          Toastr::success('Image updated');
          return redirect(route('admin.galleries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = ImageGallery::find($id);
        Storage::delete('public/gallery/image'.$image->image);
        $image->delete();
        
        Toastr::success("Image deleted");
        return redirect()->back();
    }
}
