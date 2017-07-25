<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationQuestion extends Model
{
    protected $guarded=['id'];

    public function applicationSessions(){
        return $this->belongsToMany(ApplicationSession::class);
    }
}
