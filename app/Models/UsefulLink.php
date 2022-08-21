<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsefulLink extends Model
{
    //
     protected $fillable = ['arabic_name' ,'english_name','active','useful_category_id','link'];


      public function UsefulCategory()
    {
        return $this->belongsTo('App\Models\UsefulCategory');
    }
}
