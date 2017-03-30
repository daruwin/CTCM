<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
	public function Teacher()
	{
		return $this->belongsTo('App\Teacher');
	}
	public function Workshop()
	{
		return $this->hasOne('App\Workshop');
	}
	
	public function Classroom()
	{
		return $this->belongsTo('App\Classroom');
	}


	 public function Schedule()
	 {
	 	return $this->belongsTo('App\Schedule','ProposalSchedule');
	 }
	
	public function Temary()
	{
		return $this->belongsTo('App\Temary');
	}
}
