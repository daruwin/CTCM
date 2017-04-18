<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public function Applicant()
    {
    	return $this->belongsToMany('App\Applicant','applicant_workshop');//'workshop_id','applicant_id');
    }
    public function Applicant()
    {
    	return $this->hasMany('App\Schedule');//'workshop_id','applicant_id');
    }
}
