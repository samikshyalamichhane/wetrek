<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelitourBooking extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function helitourcostanddate()
    {
       return $this->belongsTo('App\Models\HelitourCostandDate', 'helitourcostanddate_id');
    }

    public function helitourpackage()
    {
       return $this->belongsTo('App\Models\HelitourPackage', 'helitourpackage_id');
    }
}
