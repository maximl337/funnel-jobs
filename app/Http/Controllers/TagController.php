<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Tag;
use App\Http\Requests;

class TagController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$tags = Tag::all();
    	
    	return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'tags' => 'required'
            ],
            [
                'tags.required' => 'Please select atleast one skill'
            ]);

        $input = $request->input();

        $user = Auth::user();

        $user->tags()->detach();

        $user->tags()->attach($input['tags']);

        return redirect('/jobs/myskills');
    }
}
