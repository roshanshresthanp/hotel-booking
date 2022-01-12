<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback\Feedback;
use App\Models\Contact\Contact;

use Toastr;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fb = Feedback::where('deleted_at',null)->latest()->get();
        return view('admin.feedbacks.index',compact('fb'));
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
        $feedback = Feedback::find($id);
        return view ('admin.feedbacks.show',compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view ('admin.contacts.edit',compact('contact'));
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
// dd($request->all());
        $this->validate($request, [
        'location' => 'nullable| string| max:255',
        'fb_link' => 'nullable| string| max:255',
        'insta_link' => 'nullable| string| max:255',
        'twitter_link' => 'nullable| string| max:255',
        'mail' => 'email| string| max:255',
        'contact' => 'nullable| string| max:255',
        'location_map' => 'nullable'
        ]);
        
      $contact = Contact::find($id);

      $contact->update($request->all());

        Toastr::success('Contact updated');
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
        $fb = Feedback::find($id);
        $fb->delete();
        Toastr::success('Feedback deleted');
        return redirect()->back();
    }
}
