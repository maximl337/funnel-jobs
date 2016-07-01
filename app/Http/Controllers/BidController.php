<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;

class BidController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$limit = $request->get('limit') ?: 9;

    	$page = $request->get('page') ?: 0;

    	$jobs = Auth::user()->jobBids()->paginate($limit);

    	return view('bids.index', compact('jobs'));
    }
}
