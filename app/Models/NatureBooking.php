<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NatureBooking extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function naturepackagecostanddate()
    {
       return $this->belongsTo('App\Models\NaturePackageCostandDate', 'naturepackagecostanddate_id');
    }

    public function naturepackage()
    {
       return $this->belongsTo('App\Models\NaturePackage', 'naturepackage_id');
    }
}
