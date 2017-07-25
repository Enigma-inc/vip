<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationSession extends Model
{
    protected $guarded=['id'];

     public function questions()
    {
        return $this->belongsToMany(ApplicationQuestion::class);
    }
}
