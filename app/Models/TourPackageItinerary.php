<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackageItinerary extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function tourpackage()
    {
      return $this->belongsTo('App\Models\TourPackage', 'tourpackage_id');
    }
}
