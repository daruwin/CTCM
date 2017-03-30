<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
	public function Classroom()
	{
		return $this->belongsToMany('App\Classroom','ClassroomSchedule');
	}
	
	public function Proposal()
	{
		return $this->belongsToMany('App\Proposal','ProposalSchedule');
	}
}
