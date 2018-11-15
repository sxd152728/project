<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $table = "comments";
	protected $primaryKey = "id";
    public function articles()
    {
    	return $this->belongsTo('App\Models\Articles','uid');
    }
       public function user()
   {
   	return $this->belongsTo('App\User','pid');
   }
}
