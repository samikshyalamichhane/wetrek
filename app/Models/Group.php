<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=['title','slug','publish','destinationtype_id'];

    public function destinationType(){
    	return $this->belongsTo('App\Models\Destinationtype','destinationtype_id');
    }

    // public function destinationtype()
    // {
    //   return $this->belongsTo('App\Models\Destinationtype', 'destinationtype_id');
    // }

    public function destinations(){
    	return $this->hasMany('App\Models\Destination','group_id');
    }
}
