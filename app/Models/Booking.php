<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function destination()
    {
       return $this->belongsTo('App\Models\Destination', 'destination_id');
    }
    public function costanddate()
    {
       return $this->belongsTo('App\Models\CostandDate', 'costanddate_id');
    }

   //  public function tourcostanddate()
   //  {
   //     return $this->belongsTo('App\Models\TourCostandDate', 'tourcostanddate_id');
   //  }

    public function package()
    {
       return $this->belongsTo('App\Models\Package', 'package_id');
    }

}
