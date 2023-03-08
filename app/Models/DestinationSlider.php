<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationSlider extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function destination()
    {
        return $this->belongsTo('App\Models\Destination','destination_id');
    }
}
