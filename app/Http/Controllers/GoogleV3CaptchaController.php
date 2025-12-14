<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Mail\Contact;


class GoogleV3CaptchaController extends Controller
{

    public function index()
    {
        return view('pages.contacts');
    }

    public function validateGCaptch(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:lyacosnet,0.7'
        ]);

        $save = new ContactUs;

        $save->name = $request->name;
        $save->email = $request->email;
        $save->subject = request('email_to') ? 'Contact for '.request('email_to') : 'Contact';
        $save->message = $request->description;

        $save->save();




        if(is_null(request('email_to')))
        {
            $email_to = 'lyacos@yahoo.co.uk';
        }
        else
        {
            $email_to = str_replace("(at)", "@", request('email_to'));
        }

// $email_to = 'giacomo.gasperini@gmail.com';

        try{
            \Mail::to($email_to)->send( new Contact( request('name'), request('email'), request('description') ) );
            return back()->with('message', 'Thank you Email Sent');
        }
        catch(\Exception $e){
            throw $e;
        }



        return back()->with('message', 'We are updating the website, for the moment we are unable to send this email. Try again in 48 hours');

    }

    public function all()
    {
        if(is_null(auth()->user()))
        {
            abort(503);
        }

        $elements = ContactUs::latest()->get();
        return view('pages.admin.contacts', compact('elements'));
    }

    public function destroy($id)
    {
        ContactUs::find($id)->delete();
        return back();
    }

}
