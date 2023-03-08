<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdventureBooking extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function adventurepackagecostanddate()
    {
       return $this->belongsTo('App\Models\AdventurePackageCostandDate', 'adventurepackagecostanddate_id');
    }

    public function adventurepackage()
    {
       return $this->belongsTo('App\Models\AdventurePackage', 'adventurepackage_id');
    }

}
