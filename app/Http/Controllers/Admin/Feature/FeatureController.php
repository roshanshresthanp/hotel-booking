<?php

namespace App\Http\Controllers\Admin\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature\Feature;
use Illuminate\Support\Facades\Storage;

use Toastr;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $feature = Feature::where('deleted_at',null)->latest()->get();
        return view('admin.features.index',compact('feature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.features.create');
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
            'name' => 'required| string| max:255',
            'description' => 'nullable| string| max:255',
            'icon' => 'nullable|mimes:jpg,jpeg,png,svg,webp'
        ]);
        // dd($request->all());

        if($request->hasFile('icon'))
        {
            $FilenameWithExtension1 = $request->file('icon')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('icon')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('icon')->storeAs('public/icon',$FileToStore1);

                    
        }

        $feature = new Feature();
        
            $feature->name = $request->name;
            $feature->price = $request->price;
            $feature->description = $request->description;
            $feature->status = $request->status;
            if($request->hasFile('icon')){
                $feature->icon = $FileToStore1;
            }
            $feature->save();

            Toastr::success('Feature added', $title = null, $options = []);

            return redirect(route('admin.features.index'));
            // ->with('success','Category added !!');
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.features.edit',compact('feature'));
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'icon'=> 'nullable|mimes:jpg,jpeg,png,svg,webp'
        ]);

        
        $feat = Feature::find($id);
        if($request->hasFile('icon'))
        {
            $FilenameWithExtension1 = $request->file('icon')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('icon')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('icon')->storeAs('/public/icon',$FileToStore1);

            Storage::delete('public/icon'.$feat->icon); 

        }
        
        
        
            $feat->name = $request->name;
            $feat->price = $request->price;
            $feat->description = $request->description;
            $feat->status = $request->status;
            if($request->hasFile('icon')){
                  
                $feat->icon = $FileToStore1;
            }
            $feat->save();

            Toastr::success('Feature updated');
            return redirect(route('admin.features.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feat = Feature::find($id);
        Storage::delete('public/icon/'.$feat->icon);            

        $feat->delete();
        Toastr::success('Feature deleted');
        return redirect()->back();
    }
}
