<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
     protected $fillable = ['arabic_name' ,'english_name','active'];

      public function contactValues()
    {
        return $this->hasMany('App\Models\ContactValue');
    }
}
