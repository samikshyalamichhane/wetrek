<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelitourPackageItinerary extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function helitourpackage()
    {
      return $this->belongsTo('App\Models\HelitourPackage', 'helitourpackage_id');
    }
}
