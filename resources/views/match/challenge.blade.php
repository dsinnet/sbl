@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div id="" class="well">
          <h2>Create Match</h2>
        
          <div id="" class="well">
							<h1>Challenge {{ $opponent->name }}?</h1>
      				{{ Form::open(array('url' => 'match')) }}
      				  {{ Form::hidden('opponent_id', $opponent->id) }}
                {{ Form::submit('Challenge') }}
              {{ Form::close() }}

          </div>
          
        </div>
    </div>
</div>
@endsection
