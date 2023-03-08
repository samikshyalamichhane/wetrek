<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable=['name','slug','published'];

      public function tourpackages(){
        return $this->hasMany('App\Models\TourPackage','tour_id','id');
      }

      public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

      
      
      

      
}
