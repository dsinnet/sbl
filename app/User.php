<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected function challenges()
    {
      return $this->hasMany('App\Matches', 'id', 'challenger');
    }
    
    public function results()
    {
      return $this->hasMany('App\Result', 'assigned_to');
    }
    
    public function getPlayerScore()
    {
	    $score = 0;
			foreach($this->results as $result){
				$score = $score + $result->points;
			}
			return $score;
    }
    
    public function getPlayerRating()
    {  
    
    	if($this->results()->count() > 3){
	    	return $this->getPlayerScore() / $this->results()->count();
    	} else {
	    	return 'UQ';
    	}
	    
			
    }
    
  
}
