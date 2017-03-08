<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    
    protected $fillable = ['path_id','latitude','longitude','altitude'];
    
    public function path()
    {
	    return $this->belongsTo('App\Path');
    }
    
}
