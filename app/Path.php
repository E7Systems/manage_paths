<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    protected $fillable = ['latitude','longitude','altitude','photo_url'];
    
    public function points()
    {
	    return $this->hasMany('App\Point');
    }
    
    public function image()
    {
	    return $this->hasOne('App\Image');
    }
}
