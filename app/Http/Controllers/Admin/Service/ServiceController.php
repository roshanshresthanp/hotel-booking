<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Toastr;

use App\Models\Service\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::where(['deleted_at'=>null])->latest()->get();
        // dd($service);
       return view('admin.services.index',compact('service')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create'); 

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
            'image.*' => 'required|mimes:jpg, jpeg, svg, png,webp| max:10000',
            'status' => 'nullable'

        ]);

        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $file)
            {
                $FilenameWithExtension1 = $file->getClientOriginalName();
                $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
                $Extension1 = $file->getClientOriginalExtension();
                $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
                $path1 = $file->storeAs('/public/service',$FileToStore1);
                $data[] = $FileToStore1; 
                
            }
        }

        $service = new Service();
        $service->description = $request->description;
        $service->title = $request->title;
        $service->status = $request->status;

        if($request->hasFile('image'))
        {
            $service->image = json_encode($data);
        }
        $service->save();
        Toastr::success('Service added');

        return redirect(route('admin.services.index'));
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
        $service = Service::find($id);
        return view('admin.services.edit', ['service' => $service]);
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
            'image.*' => 'nullable| image| max:10000',

        ]);

        $service = Service::find($id);

        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $file)
            {
                $FilenameWithExtension1 = $file->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $file->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $file->storeAs('/public/service',$FileToStore1);

                if(isset($service->image)){
                foreach(json_decode($service->image) as $img)
                Storage::delete('public/service/'.$img);
                }
                $data[] = $FileToStore1; 
            }
                       
        }

        $service->description = $request->description;
        $service->title = $request->title;
        $service->status = $request->status;

        if($request->hasFile('image'))
        {
            $service->image = json_encode($data);
        }
        $service->save();
        Toastr::success('Service updated');

        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if(isset($service->image)){
            foreach(json_decode($service->image) as $img)
            Storage::delete('public/service/'.$img);
        }           
        $service->delete();
        
        Toastr::success('Service Deleted');
        return redirect()->back();
    }
}
