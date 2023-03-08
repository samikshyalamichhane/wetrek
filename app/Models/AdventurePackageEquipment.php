<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdventurePackageEquipment extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
        // dd(1);
      return $query->where('published', 1);
    }
    
    public function adventurepackage()
    {
      return $this->belongsTo('App\Models\AdventurePackage', 'adventurepackage_id');
    }
}
