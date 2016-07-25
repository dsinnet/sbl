@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
			<h2>Qualified Players</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Index</th>
						<th>Player Name</th>
						<th>Matches Played</th>
						<th>Player Rating</th>
						<th>Games Won</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($players as $player)
					@if($player->rating !== 'UQ')
						<tr 
							@if($player->id == $user->id)
								style="background-color: green; color: white;"
							@endif
						>
							<td>
								{{ $player->index }}
							</td>
							<td>
								{{ $player->name }}
							</td>
							<td>
								{{ $player->matches }}
							</td>
							<td>
								{{ round($player->rating, 1) }}
							</td>
							<td>
								{{ $player->score }}
							</td>
							<td>
								@if( $player->index <= $user->index+config('settings.challengeVariant') and $player->index >= $user->index-config('settings.challengeVariant') and $player->id !== $user->id )
								  <a class="btn btn-default btn-xs" href="/challenge/{{ $player->id }}">Challenge</a>
								@endif
							</td>
						</tr>
					@endif
				@endforeach
			</table>
			
			<h2>Unqualified Players</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Player Name</th>
						<th>Matches Played</th>
						<th>Player Rating</th>
						<th>Games Won</th>
					</tr>
				</thead>
				@foreach($players as $player)
					@if($player->rating == 'UQ')
						<tr>
							<td>
								{{ $player->name }}
							</td>
							<td>
								{{ $player->matches }}
							</td>
							<td>
								{{ $player->rating }}
							</td>
							<td>
								{{ $player->score }}
							</td>
						</tr>
					@endif
				@endforeach
			</table>

    </div>
  </div>
</div>
@endsection
