<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Result;
use App\User;
use App\Http\Requests;
use Validator;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
				$totalGames = $request->challenger_games + $request->opponent_games;
				$data = array('totalGames' => $totalGames);
				
        $validator = Validator::make($data, [
           'totalGames' => 'required|integer|size:15'
        ]);

        if ($validator->fails()) {
            return redirect('/match')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        
        $user = Auth::user();
        $challengerResult = new Result;
        $challengerResult->points = $request->challenger_games;
        $challengerResult->user_id = $user->id;
        $challengerResult->assigned_to = $request->challenger_id;
        $challengerResult->status = 'proposed';
        $challengerResult->match_id = $request->match_id;
        $challengerResult->save();
        
        $opponentResult = new Result;
        $opponentResult->points = $request->opponent_games;
        $opponentResult->user_id = $user->id;
        $opponentResult->assigned_to = $request->opponent_id;
        $opponentResult->status = 'proposed';
        $opponentResult->match_id = $request->match_id;
        $opponentResult->save();

        return redirect()->route('match.show', ['id' => $request->match_id]);
    }

			/**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function leaderboard()
    {
        // Get user
        $user = Auth::user();
        
        // Get all users as Players
        $players = User::with('results')->get();
				
				foreach($players as $player) {
										
					$player->score = $player->getPlayerScore();
					$player->matches = $player->results()->count();
	
				}
				
				$players = $players->except(['rating', 'UQ'])->sortByDesc('rating');

				
				return view('result.leaderboard', compact('players', 'user'));
    }		
    



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
