<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Whywithus extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

    public function whywithus_iconUrl()
    {
        return Storage::url($this->whywithus_icon);
    }
}
