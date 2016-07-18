@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div id="" class="well">
        <h2>Match {{ $match->id }}</h2>
        <div id="" class="well">
          <h1>{{  $challenger->name . ' - challenges - ' . $opponent->name }}</h1>
          <cite>Challenge set: {{ $match->created_at }}</cite>
        </div>
        

        
        @if( count($results) > 0)
        
          <h3>Result</h3>
          <table class="table">
            <tr>
              <th>Player</th><th>Games won</th>
            </tr>
            @foreach($results as $result)
          	<tr>
          		<td>{{ $result->user->name }}</td>
          		<td>{{ $result->points }}</td>
          	</tr>
          	@endforeach
          </table>
			
          
          
          
          
          @if($confirmationRequired == 'true')
           {{ Form::open(array('url' => 'result/confirm/' . $match->id)) }}
           
            {{ Form::hidden('match_id', $match->id) }}
            {{ Form::submit('Confirm Result') }}
           {{ Form::close() }}
          @elseif($confirmationRequired == 'false')
            <h4>Confirmation required</h4>
            <p>Confirmation is required by the other player. They will receive notification of your proposed result.</p>
          @elseif($confirmationRequired == 'confirmed')
            <h4>Result Confirmed and match completed</h4>
          @endif
          
        @else
        
        <h3>Add result</h3>
        {{ Form::open(array('url' => 'result')) }}
          {{ Form::hidden('match_id', $match->id) }}
          {{ Form::hidden('challenger_id', $challenger->id) }}
          {{ Form::hidden('opponent_id', $opponent->id) }}
				  {{ Form::text('challenger_games') }}<br>
				  {{ Form::text('opponent_games') }}<br>
          {{ Form::submit('Create') }}
        {{ Form::close() }}
        
        @endif
        
        
      </div>
    </div>
</div>
@endsection
