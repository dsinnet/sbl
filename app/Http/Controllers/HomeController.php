<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Match;
use App\Result;
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
        
        // Get all users as Players
        $user = Auth::user();
				
        $results = Result::with('match.challenger', 'match.opponent' )->where('assigned_to', $user->id)->get();
				
					$score = 0;
					foreach($results as $result){
						$score = $score + $result->points;
					}
					// $score = count($score);
					// $player->score = $score;

				// dd($results);

				// dd($players);
				return view('home', compact('results', 'score' ));
        
        return view('home');
    }
}
