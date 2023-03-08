<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelitourCostandDate extends Model
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
    public function helitourpackage()
    {
      return $this->belongsTo('App\Models\HelitourPackage', 'helitourpackage_id');
    }

    public function helitourbooking()
    {
      return $this->hasMany('App\Models\HelitourBooking', 'helitourcostanddate_id');
    }
}
