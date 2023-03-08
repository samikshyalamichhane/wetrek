<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NaturePackageCostandDate extends Model
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
    public function naturepackage()
    {
      return $this->belongsTo('App\Models\NaturePackage', 'naturepackage_id');
    }

    public function naturebooking()
    {
      return $this->hasMany('App\Models\NatureBooking', 'naturepackagecostanddate_id');
    }
}
