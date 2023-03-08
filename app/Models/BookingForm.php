<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingForm extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function package()
    {
       return $this->belongsTo('App\Models\Package', 'package_id');
    }

    public function costanddate()
    {
       return $this->belongsTo('App\Models\CostandDate', 'costanddate_id');
    }
}
