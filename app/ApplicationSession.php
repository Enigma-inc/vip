<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationSession extends Model
{
    protected $guarded=['id'];
    protected $fillable =['active'];
     public function questions()
    {
        return $this->belongsToMany(ApplicationQuestion::class);
    }
}
