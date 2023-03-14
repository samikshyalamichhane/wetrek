<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function regions()
    {
        return $this->hasMany('App\Models\Region', 'category_id');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\Package', 'category_id', 'id');
    }

    public function scopePublish($query)
    {
        return $query->wherePublished(1);
    }
}
