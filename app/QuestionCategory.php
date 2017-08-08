<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;


      public function questions(){
        return $this->hasMany(ApplicationQuestion::class,'question_category_id');
    }
}
