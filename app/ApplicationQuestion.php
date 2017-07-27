<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationQuestion extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;

    public function applicationSessions(){
        return $this->belongsToMany(ApplicationSession::class);
    }

    public function category(){
        return $this->belongsTo(QuestionCategory::class,'question_category_id');
    }
}
