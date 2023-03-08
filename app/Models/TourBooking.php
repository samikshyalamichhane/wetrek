<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function tourcostanddate()
    {
       return $this->belongsTo('App\Models\TourCostandDate', 'tourcostanddate_id');
    }

    public function tourpackage()
    {
       return $this->belongsTo('App\Models\TourPackage', 'tourpackage_id');
    }
}
