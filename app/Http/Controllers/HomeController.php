<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Match;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $madeChallenges = Match::with('challenger', 'opponent')->where('challenger_id', $user->id)->get();
        $receivedChallenges = Match::with('challenger', 'opponent')->where('opponent_id', $user->id)->get();
        $matches = Match::with('challenger', 'opponent')->get();
                

        
        return view('home', compact('matches', 'madeChallenges', 'receivedChallenges'));
    }
}
