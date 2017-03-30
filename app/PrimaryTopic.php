<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrimaryTopic extends Model
{
	public function Temary()
	{
		return $this->belongTo('App\Temary');
	}
	
	public function SecondaryTopic()
	{
		return $this->hasMany('App\SecondaryTopic');
	}
}
