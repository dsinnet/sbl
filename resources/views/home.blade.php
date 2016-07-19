@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <a class="btn btn-primary" href="match/create">Challenge someone</a>
        <div id="" class="well">
          <h2>Welcome</h2>
        
          <div id="" class="well">
            <h4>Your results</h4>
            <table class="table">
              <thead>
                <tr>
                  <th>Challenger</th>
                  <th>Opponent</th>
                  <th>Challenge Date</th>
                  <th>Result Date</th>
                  <th class="text-right">Points</th>
                </tr>
              </thead>
              @foreach($results as $result)
              <tbody>
                <tr>
                  <td>{{ $result->match->challenger->name }}</td>
                  <td>{{ $result->match->opponent->name }}</td>
                  <td>{{ $result->match->created_at }}</td>
                  <td>{{ $result->created_at }}</td>
                  <td class="text-right">{{ $result->points }}</td>
                </tr>
              </tbody>
              @endforeach
              <tfoot>
                <tr>
                  <td colspan="5" class="text-right">
                    {{ $score }}
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
          
        </div>
    </div>
</div>
@endsection
