<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadsUp extends Model
{
    protected $fillable = [
        'title', 'url', 'image_path','body'
    ];
}
