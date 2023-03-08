<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelitourPackageFaq extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
        // dd(1);
      return $query->where('published', 1);
    }
    
    public function helitourpackage()
    {
      return $this->belongsTo('App\Models\HelitourPackage', 'helitourpackage_id');
    }
}
