<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourCostandDate extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
      return $query->where('published', 1);
    }
    public function scopeUpcomingTreks($query)
    {
      return $query->where('upcoming_treks', 1);
    }
    public function tourpackage()
    {
      return $this->belongsTo('App\Models\TourPackage', 'tourpackage_id');
    }
    
    public function tourbooking()
    {
      return $this->hasMany('App\Models\TourBooking', 'tourcostanddate_id');
    }
}
