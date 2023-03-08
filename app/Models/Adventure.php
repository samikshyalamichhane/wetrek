<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    protected $fillable=['name','slug','published'];

      public function adventurepackages(){
        return $this->hasMany('App\Models\AdventurePackage','adventure_id','id');
      }

      public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }
}
