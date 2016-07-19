@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <a class="btn btn-primary" href="match/create">Challenge someone</a>
        <div id="" class="well">
          <h2>Matches</h2>
        
          <div id="" class="well">
            <h4>Challenges made</h2>
            <ul class="list-group">
            @foreach ($madeChallenges as $madeChallenge)
              <li class="list-group-item">{{ 'You challenged - ' . $madeChallenge->opponent->name . ' Status: ' . $madeChallenge->status }}  |  <a class="btn btn-small" href="/match/{{ $madeChallenge->id }}">view</a></li>
            @endforeach
            </ul>
          </div>
          
          <div id="" class="well">
            <h4>Challenges received</h2>
            <ul class="list-group">
            @foreach ($receivedChallenges as $receivedChallenge)
              <li class="list-group-item">{{ $receivedChallenge->challenger->name . ' - challenged you  ' . ' Status: ' . $receivedChallenge->status }}  |  <a class="btn btn-small" href="/match/{{ $receivedChallenge->id }}">view</a></li>
            @endforeach
            </ul>
          </div>
          
          <div id="" class="well">
            <h4>Matches</h2>
            <ul class="list-group">
            @foreach ($matches as $match)
              <li class="list-group-item">{{ 'Match ID: ' . $match->id . ' Challenger Name: ' . $match->challenger->name . ' Opponent Name: ' . $match->opponent->name }}</li>
            @endforeach
            </ul>
          </div>
          
        </div>
    </div>
</div>
@endsection
