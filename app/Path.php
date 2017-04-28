<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    protected $fillable = ['latitude','latitude_ref','longitude','longitude_ref','altitude','dop','roll','pitch','yaw','rotation_matrix','quaternion','image_direction','image_id','photo_taken_at'];
    
    public function points()
    {
	    return $this->hasMany('App\Point');
    }
    
    public function image()
    {
	    return $this->hasOne('App\Image','id','image_id');
    }
}
