<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAnswer extends Model
{
     protected $guarded=['id'];

    public function question(){
        return $this->belongsTo(ApplicationQuestion::class,'question_id');
    }
    public function applicationSession(){
        return $this->belongsTo(ApplicationSession::class);
    }

    
}
