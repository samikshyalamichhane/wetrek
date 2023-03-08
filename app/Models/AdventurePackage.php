<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdventurePackage extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function destination(){
    	return $this->belongsTo('App\Models\Destination','destination_id');
    }

    public function adventure(){
    	return $this->belongsTo('App\Models\Adventure','adventure_id');
    }

    public function activity(){
    	return $this->belongsTo('App\Models\Activity','activity_id');
    }

    public function adventurepackageitinerary()
    {
      return $this->hasMany('App\Models\AdventurePackageItinerary', 'adventurepackage_id')->orderBy('order_row');
    }

    public function adventurepackageequipment()
    {
      return $this->hasMany('App\Models\AdventurePackageEquipment', 'adventurepackage_id');
    }

    public function adventurepackagecostanddate()
    {
      return $this->hasMany('App\Models\AdventurePackageCostandDate', 'adventurepackage_id');
    }

    public function adventurepackagegdp()
    {
      return $this->hasMany('App\Models\AdventurePackageGdp', 'adventurepackage_id');
    }

    public function adventurepackagefaq()
    {
      return $this->hasMany('App\Models\AdventurePackageFaq', 'adventurepackage_id');
    }

    public function slider__images()
    {
        return $this->hasMany('App\Models\AdventurePackageSlider', 'adventurepackage_id');
    }


    public function adventurebooking()
    {
      return $this->hasMany('App\Models\AdventureBooking', 'adventurepackage_id');
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
