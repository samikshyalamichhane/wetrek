<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travelersreview extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
       return $query->wherePublished(1);
    }
}
