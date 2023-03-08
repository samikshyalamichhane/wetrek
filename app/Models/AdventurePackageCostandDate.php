<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdventurePackageCostandDate extends Model
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
    public function adventurepackage()
    {
      return $this->belongsTo('App\Models\AdventurePackage', 'adventurepackage_id');
    }
    public function adventurebooking()
    {
      return $this->hasMany('App\Models\AdventureBooking', 'adventurepackagecostanddate_id');
    }
}
