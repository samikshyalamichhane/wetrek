<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Destinationtype;
use Cviebrock\EloquentSluggable\Sluggable;

class Destination extends Model
{
  use Sluggable;
  protected $guarded = ['id', 'created_at', 'updated_at'];
    

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function destinationtype()
    {
       return $this->hasMany('App\Models\Destinationtype', 'destination_id');
    }

    public function itinerary()
    {
      return $this->hasMany('App\Models\Itinerary', 'destination_id');
    }
    public function faq()
    {
      return $this->hasMany('App\Models\Faq', 'destination_id');
    }

    public function review()
    {
      return $this->hasMany('App\Models\Review', 'destination_id');
    }

    public function booking()
    {
      return $this->hasMany('App\Models\Booking', 'destination_id');
    }

    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

    public function scopePopularsales($query)
    {
      return $query->wherePopular_sales(1);
    }

    public function scopeHolidays($query)
    {
      return $query->whereHolidays(1);
    }

    public function scopeFeaturedtrips($query)
    {
      return $query->whereFeatured_trips(1);
    }

    public function scopeOutboundtrips($query)
    {
      return $query->whereOutbound_trips(1);
    }
    public function scopeDestinationslug($query, $slug)
    {
       return $query->whereSlug($slug);
    }

    public function slider__images()
    {
        return $this->hasMany('App\Models\DestinationSlider','destination_id');
    }

    public function packages(){
    	return $this->hasMany('App\Models\Package','destination_id');
    }

    public function tourpackage(){
    	return $this->hasMany('App\Models\TourPackage','tourpackage_id');
    }

    public function adventurepackage(){
    	return $this->hasMany('App\Models\AdventurePackage','adventurepackage_id');
    }

    public function helitourpackage(){
    	return $this->hasMany('App\Models\HelitourPackage','helitourpackage_id');
    }

    public function naturepackage(){
    	return $this->hasMany('App\Models\NaturePackage','naturepackage_id');
    }




}
