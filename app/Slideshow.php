<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Slideshow extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'bgImage_path', 'description', 'button_link', 
    ];
    protected $hidden=['created_at','updated_at','bgImage_path'];

    protected $appends=['slide_image'];

    public function getSlideImageAttribute()
    {
        return Storage::Url($this->bgImage_path);
    }
}
