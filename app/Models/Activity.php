<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable=['name','slug','published','region_id'];

    public function region(){
    	return $this->belongsTo('App\Models\Region','region_id');
    }

    public function packages(){
    	return $this->hasMany('App\Models\Package','activity_id');
    }

    public function tourpackages(){
    	return $this->hasMany('App\Models\TourPackage','activity_id');
    }

    public function adventurepackages(){
    	return $this->hasMany('App\Models\AdventurePackage','activity_id');
    }

    public function helitourpackages(){
    	return $this->hasMany('App\Models\HelitourPackage','activity_id');
    }

    public function naturepackages(){
    	return $this->hasMany('App\Models\NaturePackage','activity_id');
    }


    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

}
