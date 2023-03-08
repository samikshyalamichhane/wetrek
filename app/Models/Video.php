<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function youtubeVideo($url)
    {
      $url_string = parse_url($url, PHP_URL_QUERY);
      parse_str($url_string, $args);
      return isset($args['v']) ? $args['v'] : false;
    }

    public function scopeHomepage($query)
    {
      return $query->whereHomepage(1);
    }

    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }
}
