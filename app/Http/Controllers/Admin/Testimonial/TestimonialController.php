<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Models\Testimonial\Testimonial;
use Toastr;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Testimonial::where(['deleted_at'=>null])->latest()->get();
        // dd($test);
       return view('admin.testimonials.index',compact('test')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create'); 

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
            'name' => 'nullable| string| max:255',
            'description' => 'nullable| string| max:255',
            'image' => 'required|image| max:10000',
            'status' => 'nullable'

        ]);

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/testimonial',$FileToStore1);

            // Storage::delete('public/Images/'.$test->image);            
        }

        $test = new Testimonial();
        $test->description = $request->description;
        $test->name = $request->name;
        $test->status = $request->status;

        if($request->hasFile('image'))
        {
            $test->image = $FileToStore1;
        }
        $test->save();
        Toastr::success('Testimonial added');

        return redirect(route('admin.testimonials.index'));
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
        $test = Testimonial::find($id);
        return view('admin.testimonials.edit', ['test' => $test]);
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
            'description' => 'nullable| string| max:255',
            'image' => 'nullable| image| max:2000',

        ]);

        $test = Testimonial::find($id);

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/testimonial/',$FileToStore1);

            Storage::delete('public/testimonial/'.$test->image);            
        }

        $test->description = $request->description;
        $test->name = $request->name;
        $test->status = $request->status;

        if($request->hasFile('image'))
        {
            $test->image = $FileToStore1;
        }

        $test->save();
        Toastr::success('Testimonial updated');

        return redirect(route('admin.testimonials.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Testimonial::find($id);
        Storage::delete('public/testimonial/'.$test->image);            
        $test->delete();
        
        Toastr::success('Testimonial Deleted');
        return redirect()->back();
    }
}
