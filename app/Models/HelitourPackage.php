<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelitourPackage extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function destination(){
    	return $this->belongsTo('App\Models\Destination','destination_id');
    }

    public function activity(){
    	return $this->belongsTo('App\Models\Activity','activity_id');
    }

    public function helitourpackageitinerary()
    {
      return $this->hasMany('App\Models\HelitourPackageItinerary', 'helitourpackage_id')->orderBy('order_row');
    }

    public function helitourpackageequipment()
    {
      return $this->hasMany('App\Models\HelitourPackageEquipment', 'helitourpackage_id');
    }

    public function helitourcostanddate()
    {
      return $this->hasMany('App\Models\HelitourCostandDate', 'helitourpackage_id');
    }

    public function helitourpackagegdp()
    {
      return $this->hasMany('App\Models\HelitourPackageGdp', 'helitourpackage_id');
    }

    
    public function helitourpackagefaq()
    {
      return $this->hasMany('App\Models\HelitourPackageFaq', 'helitourpackage_id');
    }

    public function slider__images()
    {
        return $this->hasMany('App\Models\HelitourPackageSlider', 'helitourpackage_id');
    }


    public function helitourbooking()
    {
      return $this->hasMany('App\Models\HelitourBooking', 'helitourpackage_id');
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
