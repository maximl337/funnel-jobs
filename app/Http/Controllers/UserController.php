<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\User;
use App\Tag;
use App\Http\Requests;
use App\Services\ImgurService;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function show($id, Request $request)
    {
    	try {

    		$user = User::findOrFail($id);

    		return view('users.show', compact('user'));

    	} catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    		
    		Session::flash("error", "Could not find user");

    		return redirect()->back();
    	}
    	
    }

    public function edit($id, Request $request)
    {
    	if($id != Auth::id()) {
    		Session::flash("error", "Unauthorized access");
    		return redirect()->back();
    	}

    	$user = User::findOrFail($id);

    	$tags = Tag::all();

    	return view('users.edit', compact('user', 'tags'));
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
    			'name' => 'required',
    			'tags' => 'required',
    			'zip' => 'max:12',
    			'avatar' => 'url',
                'avatar_file'   => 'image|max:5000',
    		]);

    	if(Auth::id() != $id) {
    		Session::flash("error", "Unauthorized access");
    		return redirect()->back();
    	}



    	$user = User::find($id);

    	$input = $request->input();

        if(empty($input['avatar'])) {

            if($request->hasFile('avatar_file')) {
                $input['avatar'] = (new ImgurService)->upload($request->file('avatar_file'));
            }
        }

    	$user->update($input);

    	$user->tags()->detach();

    	$user->tags()->attach($input['tags']);

    	Session::flash("success", "Profile updated successfully");

    	return redirect()->action('UserController@show', [$id]);
    }
}
