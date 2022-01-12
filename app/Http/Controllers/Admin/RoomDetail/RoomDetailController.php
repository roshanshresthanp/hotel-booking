<?php

namespace App\Http\Controllers\Admin\RoomDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
use App\Models\RoomDetail\RoomDetail;

class RoomDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = RoomDetail::where(['status'=>1,'deleted_at'=>null])->get();
        return view('admin.room-details.index',compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room-details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'status'=>'nullable'
        ]);
        $detail = new RoomDetail();
        $detail->name = $request->name;
        $detail->status = $request->status;

        $detail->save();
        Toastr::success('Room Detail added');

        return redirect(route('admin.room-details.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = RoomDetail::find($id);
        $detail->delete();

        Toastr::success('Room Detail deleted');

        return redirect()->back();
    }
}
