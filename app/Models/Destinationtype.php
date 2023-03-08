<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Destination;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Destinationtype extends Model
{
    use Sluggable;
  protected $guarded = ['id', 'created_at', 'updated_at'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'country_name'
            ]
        ];
    }

    public function imageUrl()
    {
        return Storage::disk('public')->url($this->banner_image);
    }

    public function destination()
    {
      return $this->belongsTo('App\Models\Destination', 'destination_id');
    }

    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

    public function scopeFindwithslug($query, $slug)
    {
      return $query->whereSlug($slug);
    }
    public function groups(){
      return $this->hasMany('App\Models\Group','destinationtype_id');
    }

    public function packages(){
      return $this->hasMany('App\Models\Package','destinationtype_id');
    }

}
