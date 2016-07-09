<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\User;
use Auth;
use Session;
use App\Http\Requests;

class MessageController extends Controller
{
    public function send(Request $request)
    {
    	$this->validate($request, [
    			'message' => 'required',
    			'recipient_id' => 'required'
    		]);

    	try {

    		$input = $request->input();

	    	$recipient = User::find($input['recipient_id']);

	    	$user = Auth::user();

	    	$body = $input['message'];

	    	$data = [
	    		'sender' => $user,
	    		'body' => $body
	    	];

	    	$subject = $user->name . " sent you a message!";

	    	Mail::send('emails.new_message', $data, function ($m) use ($recipient, $subject) {
	            $m->to($recipient->email, $recipient->name)->subject($subject);
	        });

    		Session::flash("success", "Mail sent successfully");

    	} catch (Exception $e) {

    		Session::flash("error", $e->getMessage());

    	}

    	return redirect()->back();
    	
    }
}
