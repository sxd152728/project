<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{	
	use SoftDeletes;
	protected $table = "articles";
   public function cates()
   {
   	return $this->belongsTo('App\Models\Cates','uid');
   }
   public function user()
   {
   	return $this->belongsTo('App\User','cid');
   }
}
