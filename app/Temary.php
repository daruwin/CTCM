<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temary extends Model
{
	protected $table='temaries';
	
	public function Proposal()
	{
		return $this->hasMany('App\Proposal');
	}
	
	public function PrimaryTopic()
	{
		return $this->hasMany('App\PrimaryTopic');
	}
}
