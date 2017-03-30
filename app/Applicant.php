<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{

	public function Workshop()
	{
		return $this->belongsToMany('App\Workshop','applicant_workshop');//,'applicant_id','workshop_id');
	}
}
