<?php

namespace App\Models;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Region extends Model
{
    protected $guarded=['id','created_at','updated_at'];

    public function activitys(){
        return $this->hasMany('App\Models\Activity','region_id');
      }

      public function category(){
        return $this->belongsTo('App\Models\Category','region_id');
      }

      public function packages(){
        return $this->hasMany('App\Models\Package','region_id','id');
      }

      public function scopePublish($query)
    {
      return $query->wherePublish(1);
    }

    public function banner_imageUrl()
    {
        return Storage::url($this->banner_image);
    }



}
