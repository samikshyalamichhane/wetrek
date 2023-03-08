<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function destination(){
    	return $this->belongsTo('App\Models\Destination','destination_id');
    }

    public function region(){
    	return $this->belongsTo('App\Models\Region','region_id');
    }

    public function tour(){
    	return $this->belongsTo('App\Models\Tour','tour_id');
    }

    public function activity(){
    	return $this->belongsTo('App\Models\Activity','activity_id');
    }

    public function tourpackageitinerary()
    {
      return $this->hasMany('App\Models\TourPackageItinerary', 'tourpackage_id')->orderBy('order_row');
    }

    public function tourpackageequipment()
    {
      return $this->hasMany('App\Models\TourPackageEquipment', 'tourpackage_id');
    }

    public function tourcostanddate()
    {
      return $this->hasMany('App\Models\TourCostandDate', 'tourpackage_id');
    }

    public function tourpackagegdp()
    {
      return $this->hasMany('App\Models\TourPackageGdp', 'tourpackage_id');
    }

    public function tourpackagefaq()
    {
      return $this->hasMany('App\Models\TourPackageFaq', 'tourpackage_id');
    }
    public function slider__images()
    {
        return $this->hasMany('App\Models\TourPackageSlider', 'tourpackage_id');
    }


    public function tourbooking()
    {
      return $this->hasMany('App\Models\TourBooking', 'tourpackage_id');
    }


    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

    public function scopePopulartours($query)
    {
      return $query->wherePopular_tours(1);
    }

}
