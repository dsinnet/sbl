<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User', 'assigned_to');
    }
    
    public function match()
    {
      return $this->belongsTo('App\Match');
    }
    
    
}
