<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\Http\Requests;

class BidController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');

        $this->middleware('bidder', ['only' => ['update', 'destroy']]);

    }

    public function index(Request $request)
    {
    	$limit = $request->get('limit') ?: 9;

    	$page = $request->get('page') ?: 0;

    	$jobs = Auth::user()->jobBids()->paginate($limit);

    	return view('bids.index', compact('jobs'));
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $bid = Auth::user()->jobBids()->where("job_id", $id)->first();

        return view("bids.edit", compact('bid'));
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'message' => 'required',
                'amount' => 'required|numeric'
            ]);

        $input = $request->input();

        $user = Auth::user();

        $bid = $user->jobBids()->updateExistingPivot($id, ['bid_amount' => $input['amount'], 'bid_message' => $input['amount']]);

        Session::flash("success", "Bid updated");

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $user = Auth::user();

        $bid = $user->jobBids()->where("job_id", $id)->detach();

        Session::flash("success", "Bid removed");

        return redirect()->action('JobController@show', [$id]);
    }
}
