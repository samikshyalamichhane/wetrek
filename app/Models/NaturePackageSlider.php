<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NaturePackageSlider extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function naturepackage()
    {
        return $this->belongsTo('App\Models\NaturePackage');
    }
}
