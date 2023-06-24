<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages    = ContactUs::orderBy('created_at', 'desc')->get();

        return view('backend.message.index',compact('messages'));
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


        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'message' => 'required',
        ]);

        // Create a new message instance
        $message = new ContactUs();
        $message->name    = $request->name;
        $message->email   = $request->email;
        $message->phone   = $request->phone;
        $message->message = $request->message;

        $message->save();

        $notification = [
            'message' => 'Message Sent successfully',
            'alert-type' => 'success',
        ];

        // Redirect the user to a thank you page or any other desired destination
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $message = ContactUs::find($request->message_id);
        $message->update([
            'status' => 1
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = ContactUs::find($id);

        $message->delete();

        return redirect()->back();
    }
}
