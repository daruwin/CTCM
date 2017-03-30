<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	public function Proposal()
	{
		return $this->hasMany('App\Proposal');
	}
	
	public function Schedule()
	{
		return $this->belongsToMany('App\Schedule','ClassroomSchedule');
	}
}
