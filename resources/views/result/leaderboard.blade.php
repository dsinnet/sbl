@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
			<table class="table">
			
			@foreach($players as $player)
			<tr>
			<td>
				{{ $player->name }}
			</td>
			<td>
				{{ $player->score }}
			</td>
			</tr>
			@endforeach
			</table>

    </div>
  </div>
</div>
@endsection
