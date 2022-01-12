<?php

namespace App\Http\Controllers\Admin\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus\Aboutus;
use Illuminate\Support\Facades\Storage;

use Toastr;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = Aboutus::where(['deleted_at'=>null])->latest()->get();
        // dd($aboutus);
       return view('admin.aboutus.index',compact('aboutus')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create'); 

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
            'description' => 'nullable| string',
            'image' => 'required|image| max:10000',
            'status' => 'nullable'

        ]);

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/aboutus',$FileToStore1);

            // Storage::delete('public/Images/'.$aboutus->image);            
        }

        $aboutus = new Aboutus();
        $aboutus->description = $request->description;
        $aboutus->title = $request->title;
        $aboutus->status = $request->status;

        if($request->hasFile('image'))
        {
            $aboutus->image = $FileToStore1;
        }
        $aboutus->save();
        Toastr::success('About-us added');

        return redirect()->back();
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
        $aboutus = Aboutus::find($id);
        return view('admin.aboutus.edit', ['aboutus' => $aboutus]);
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
            'description' => 'nullable| string',
            'image' => 'nullable| image| max:10000',

        ]);

        $aboutus = Aboutus::find($id);

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/aboutus/',$FileToStore1);

            Storage::delete('public/aboutus/'.$aboutus->image);            
        }

        $aboutus->description = $request->description;
        $aboutus->title = $request->title;
        $aboutus->status = $request->status;

        if($request->hasFile('image'))
        {
            $aboutus->image = $FileToStore1;
        }
        $aboutus->save();
        Toastr::success('About us updated');

        return redirect(route('admin.about-us.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutus = Aboutus::find($id);
        Storage::delete('public/aboutus/'.$aboutus->image);            
        $aboutus->delete();
        
        Toastr::success('Aboutus Deleted');
        return redirect()->back();
    }
}
