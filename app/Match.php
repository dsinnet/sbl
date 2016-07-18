<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Match extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'matches';
    
    public function challenger()
    {
      return $this->belongsTo('App\User', 'challenger_id', 'id');
    }
    
    public function opponent()
    {
      return $this->belongsTo('App\User', 'opponent_id', 'id');
    }
}
