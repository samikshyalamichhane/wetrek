<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackageFaq extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
        // dd(1);
      return $query->where('published', 1);
    }
    
    public function tourpackage()
    {
      return $this->belongsTo('App\Models\TourPackage', 'tourpackage_id');
    }
}
