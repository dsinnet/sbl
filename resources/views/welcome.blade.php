@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <h1>Singles Box League</h1>
                    <h2>How it works</h2>
                    <p class="lead">Fist things first, you need to <a href="/register">sign up</a>.</p>
                    <p>Once you've done that then you can get on with your first challenge.</p>
                    <p>When you first register as a player you will need to go through a qualifying stage. To do this you need to successfully complete 3 matches. This means you need to make 3 challenges. As an unqualified player you can not be challenged.</p>
                    <p>Once you've successfully completed 3 matches you will enter into the league in a position based on your results. Once in the leage you are able to challenge (and can be challenged by) anyone 2 places either above or below you in the league.</p>
                    <p>Based on your results and the results of those around you, you will move up or down the league. If you are inactive and don't play any games you will become inactive and drop back down the league.</p>
                    
                    <h2>Match Format</h2>
                    <p>Matches consist of playing 15 straight games. If tied at 7 games each then a regular tie break should be played rather than a final game which ensures there is no advantage to the would be server. That's it. The result consists of the number of games won by each player.</p>
                    
                    <h2>Challenges and Challenging</h2>
                    <p>Once logged in you can visit the <a href="/leaderboard">Leaderboard</a> to view your position and click on the "Challenge" button to start the process of challenging players around you. Once you've successfully created a challenge the opponent will be notified by Email. It will be left to both players to arrange a playing time.</p>
                    <p>Once the match is completed, either payer will need to log in and enter the result from the match. The result will need to be confirmed by the other player before the results are valid and the match is completed.</p>
                    
                    
                    <h2>League Positions</h2>
                    <p>The position of a player in the league is determined by the number of matches played, divided by the number of games won. This value effectively produces a Player Rating value.</p>
                    <p>There could be a scenario where a newly qualified player has had three very good results from lower ranked opposition which would see them generate a very high Player Rating. Over time each player should find their level which will make for more exciting matches.</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
