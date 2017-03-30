<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondaryTopic extends Model
{
	public function PrimaryTopic()
	{
		return $this->belongsTo('App\PrimaryTopic');
	}
}
