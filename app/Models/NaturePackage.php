<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NaturePackage extends Model
{
   protected $guarded = ['id', 'created_at', 'updated_at'];

    public function destination(){
    	return $this->belongsTo('App\Models\Destination','destination_id');
    }

    public function activity(){
    	return $this->belongsTo('App\Models\Activity','activity_id');
    }

    public function naturepackageitinerary()
    {
      return $this->hasMany('App\Models\NaturePackageItinerary', 'naturepackage_id')->orderBy('order_row');
    }

    public function naturepackageequipment()
    {
      return $this->hasMany('App\Models\NaturePackageEquipment', 'naturepackage_id');
    }

    public function naturepackagecostanddate()
    {
      return $this->hasMany('App\Models\NaturePackageCostandDate', 'naturepackage_id');
    }

    public function naturepackagegdp()
    {
      return $this->hasMany('App\Models\NaturePackageGdp', 'naturepackage_id');
    }

    public function naturepackagefaq()
    {
      return $this->hasMany('App\Models\NaturePackageFaq', 'naturepackage_id');
    }

    public function slider__images()
    {
        return $this->hasMany('App\Models\NaturePackageSlider', 'naturepackage_id');
    }


    public function naturebooking()
    {
      return $this->hasMany('App\Models\NatureBooking', 'naturepackage_id');
    }


    public function scopePopulartours($query)
    {
      return $query->wherePopular_tours(1);
    }













    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }
}
