<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Job;
use App\Tag;
use Session;
use App\Http\Requests;

class JobController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');

        $this->middleware('employer', ['only' => ['create', 'store', 'update']]);

        $this->middleware('worker', ['only' => ['bid', 'remove_bid']]);
    }

    /**
     * [index description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
    	$limit = $request->get('limit') ?: 20;

        $page = $request->get('page') ?: 0;

        $query_string = $request->get('query');


        if(!$query_string) {

            $jobs = Job::with('tags')->with('user')->paginate($limit);

        } else {

            $jobs = Job::where("title", "LIKE", "%".$query_string."%")
                        ->with('tags')
                        ->with('user')
                        ->paginate($limit);
        }

        return view('jobs.index', compact('jobs'));
    }

    /**
     * [getByMySkills description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getByMySkills(Request $request)
    {
    	$limit = $request->get('limit') ?: 20;

        $page = $request->get('page') ?: 0;

        $tags = Auth::user()->tags()->get();

        $job_ids = [];

        foreach($tags as $tag) {

        	foreach($tag->jobs()->get(['jobs.id']) as $job) {
        		array_push($job_ids, $job->id);
        	}
        }

        $jobs = Job::whereIn('id', $job_ids)->with('tags')->orderBy('created_at', 'DESC')->paginate($limit);
        
        Session::flash('message', "We found jobs matching your skills");

        return view('jobs.index', compact('jobs'));
    }

    /**
     * [show description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function show(Request $request, $id)
    {
    	$job = Job::where('id', $id)->with('tags')->with('user')->first();

    	return view('jobs.show', compact('job'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('jobs.create', compact('tags'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
                'title' => 'required',
                'body' => 'required',
                'tags' => 'required'
            ],[
                'tags.required' => 'Please select atleast one tag'
            ]);

        $input = $request->input();

        $job = new Job($input);

        Auth::user()->jobs()->save($job);

        $job->tags()->attach($input['tags']);

        return redirect()->action('JobController@show', ['id' => $job->id])->with("success", "Job created successfully");
    }

    /**
     * Bid on a job
     * 
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function bid(Request $request, $id)
    {
        try {
    
            $this->validate($request, [
                    'message' => 'required',
                    'amount' => 'required|numeric'
                ]);

            $user = Auth::user();

            if($user->jobBids()->where('job_id', $id)->exists()) {
                throw new Exception("You have already bid on this job");
            }

            // get message
            $message = $request->get('message');

            // get bid amount
            $bid_amount = $request->get('amount');

            $job = Job::findOrFail($id);

            $user->jobBids()->save($job, ['bid_message' => $message, 'bid_amount' => $bid_amount]);

            Session::flash("success", "Bid created successfully");

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }

        return redirect()->back();
    }

    public function remove_bid(Request $request, $id)
    {
        # code...
    }


}
