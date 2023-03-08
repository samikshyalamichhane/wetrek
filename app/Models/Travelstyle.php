<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travelstyle extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

    // public function packages(){
    //   return $this->hasMany('App\Models\Package','travelstyle_id','id');
    // }
    public function packages(){
    	return $this->belongsToMany('App\Models\Package','travel_packages');
    }
}
