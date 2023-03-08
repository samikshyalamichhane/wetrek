<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostandDate extends Model
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
    public function package()
    {
      return $this->belongsTo('App\Models\Package', 'package_id');
    }

    public function booking()
    {
      return $this->hasMany('App\Models\Booking', 'costanddate_id');
    }
}
