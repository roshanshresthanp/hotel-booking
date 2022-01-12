<?php

namespace App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Storage;
use Toastr;


use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $cats = Category::where('deleted_at',null)->latest()->get();
        return view('admin.categories.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'price'=>'nullable|integer',
            'description' => 'nullable| string| max:255',
        ]);
        // dd($request->all());

        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/category',$FileToStore1);

                    
        }

        $cat = new Category();
        
            $cat->name = $request->name;
            $cat->price = $request->price;
            $cat->description = $request->description;
            $cat->status = $request->status;
            if($request->hasFile('image')){
                $cat->image = $FileToStore1;
            }
            $cat->save();

            Toastr::success('Category added', $title = null, $options = []);

            return redirect(route('admin.categories.index'));
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
        $cat = Category::find($id);
        return view('admin.categories.edit',compact('cat'));
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
            'name' => 'required| string| max:255',
            'description' => 'nullable| string| max:255',
        ]);

        
        $cat = Category::find($id);
        if($request->hasFile('image'))
        {
            $FilenameWithExtension1 = $request->file('image')->getClientOriginalName();
            $Filename1 = pathinfo($FilenameWithExtension1, PATHINFO_FILENAME);
            $Extension1 = $request->file('image')->getClientOriginalExtension();
            $FileToStore1 = $Filename1.'_'.time().'.'.$Extension1;
            $path1 = $request->file('image')->storeAs('/public/category',$FileToStore1);

            Storage::delete('public/category/'.$cat->image); 

        }
        
        
        
            $cat->name = $request->name;
            $cat->price = $request->price;
            $cat->description = $request->description;
            $cat->status = $request->status;
            if($request->hasFile('image')){
                  
                $cat->image = $FileToStore1;
            }
            $cat->save();

            Toastr::success('Category updated');
            return redirect('/admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        Storage::delete('public/category/'.$cat->image);            

        $cat->delete();
        Toastr::success('Category deleted');
        return redirect()->back();
    }
}
