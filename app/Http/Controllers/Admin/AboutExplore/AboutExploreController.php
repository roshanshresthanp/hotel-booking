<?php

namespace App\Http\Controllers\Admin\AboutExplore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutExplore\AboutExplore;
use Toastr;

use Illuminate\Support\Facades\Storage;


class AboutExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $explore = AboutExplore::where(['deleted_at'=>null])->latest()->get();
        // dd($explore);
       return view('admin.aboutexplore.index',compact('explore')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutexplore.create'); 

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
            $path1 = $request->file('image')->storeAs('/public/aboutexplore',$FileToStore1);
            
        }

        $explore = new AboutExplore();
        $explore->description = $request->description;
        $explore->title = $request->title;
        $explore->status = $request->status;

        if($request->hasFile('image'))
        {
            $explore->image = $FileToStore1;
        }
        $explore->save();
        Toastr::success('About explore added');

        return redirect(route('admin.about-explore.index'));
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
        $explore = AboutExplore::find($id);
        return view('admin.aboutexplore.edit', ['explore' => $explore]);
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

        $explore = AboutExplore::find($id);

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/aboutexplore/',$FileToStore1);

            Storage::delete('public/aboutexplore/'.$explore->image);            
        }

        $explore->description = $request->description;
        $explore->title = $request->title;
        $explore->status = $request->status;

        if($request->hasFile('image'))
        {
            $explore->image = $FileToStore1;
        }
        $explore->save();
        Toastr::success('About explore updated');

        return redirect(route('admin.about-explore.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $explore = AboutExplore::find($id);
        Storage::delete('public/aboutexplore/'.$explore->image);            
        $explore->delete();
        
        Toastr::success('About explore Deleted');
        return redirect()->back();
    }
}
