<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NaturePackageFaq extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
        // dd(1);
      return $query->where('published', 1);
    }
    
    public function naturepackage()
    {
      return $this->belongsTo('App\Models\NaturePackage', 'naturepackage_id');
    }
}
