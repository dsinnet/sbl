<?php

namespace App\Http\Controllers;
use App\Match;
use App\Result;
use App\User;
use Mail;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$user = Auth::user();
      
      $madeChallenges = Match::with('challenger', 'opponent')->where('challenger_id', $user->id)->get();
      $receivedChallenges = Match::with('challenger', 'opponent')->where('opponent_id', $user->id)->get();
      $matches = Match::with('challenger', 'opponent')->get();
                      
      return view('match.index', compact('matches', 'madeChallenges', 'receivedChallenges'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = User::pluck('name', 'id')->except(Auth::id());

        return view('match.create', compact('items'));
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

        $opponent = User::find($request->opponent_id);
        
        $match = new Match;
        $match->status = 'Challenge';
        $match->opponent_id = $request->opponent_id;
        $match->challenger_id = $user->id;
        
        $match->save();
        
        Mail::send('emails.invite', ['user' => $user, 'opponent' => $opponent], function ($m) use ($user, $opponent) {
            $m->from($user->email, 'Your Application');
            $m->to($opponent->email, $opponent->name)->subject('You\'ve been challenged');
        });
        
        $request->session()->flash('alert-success', 'Match created!');
        return redirect('/match/' . $match->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$user = Auth::user();
      $match = Match::where('id', $id)->firstOrFail();
      $challenger = User::find($match->challenger_id);
      $opponent = User::find($match->opponent_id);
      $results = Result::where('match_id', $match->id)->with('user')->get();
    	
      if(!empty($results->first())){
      	if ( $results->first()->status === 'proposed' & $user->id !== $results->first()->user_id ) {
      	  $confirmationRequired = 'true';
      	} elseif ( $results->first()->status === 'proposed' & $user->id == $results->first()->user_id ) {
        	$confirmationRequired = 'false';
      	} elseif ($results->first()->status === 'confirmed') {
        	$confirmationRequired = 'confirmed';
      	}
    	} else {
      	$confirmationRequired = NULL;
    	}
    
    	if(!Auth::user()) {
      	abort(403);
    	} else {
      	return view('match.show', compact('match', 'challenger', 'opponent', 'results', 'user', 'confirmationRequired'));
    	}  
    }


    public function confirm($id, Request $request)
    {
      $results = Result::where('match_id', $request->match_id)->get();
      foreach($results as $result) {
        $result->status = 'confirmed';
        $result->save();
      } 
      
      $match = Match::find($request->match_id);
      $match->status = 'Result';
      $match->save();
      
      return redirect()->route('match.show', ['id' => $request->match_id]);
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
