<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function logoUrl()
    {
        return Storage::url($this->logo);
    }

    public function faviconUrl()
    {
        return Storage::url($this->favicon);
    }

    public function whoweare_bannerUrl()
    {
        return Storage::url($this->whoweare_banner);
    }
    public function sqt_image1Url()
    {
        return Storage::url($this->sqt_image1);
    }
    public function sqt_image2Url()
    {
        return Storage::url($this->sqt_image2);
    }
    public function team_banner_imageUrl()
    {
        return Storage::url($this->team_banner_image);
    }
    public function testimonial_banner_imageUrl()
    {
        return Storage::url($this->testimonial_banner_image);
    }
    public function contactus_banner_imageUrl()
    {
        return Storage::url($this->contactus_banner_image);
    }
    public function blog_bannerUrl()
    {
        return Storage::url($this->blog_banner);
    }
    public function contactus_imageUrl()
    {
        return Storage::url($this->contactus_image);
    }

}
