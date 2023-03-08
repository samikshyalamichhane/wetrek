<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdventurePackageItinerary extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function adventurepackage()
    {
      return $this->belongsTo('App\Models\AdventurePackage', 'adventurepackage_id');
    }
}
