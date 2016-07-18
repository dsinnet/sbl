<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Result;
use App\Http\Requests;

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
