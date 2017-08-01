<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Startup extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'web_link', 'about', 'logo_path', 
    ];
    protected $hidden=['logo_path'];
    protected $appends=['logo'];

    public function getLogoAttribute(){
        return Storage::Url($this->logo_path);
    }
}
