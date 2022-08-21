<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsefulCategory extends Model
{
    //
    protected $fillable = ['arabic_name' ,'english_name','active'];

      public function usefulLinks()
    {
        return $this->hasMany('App\Models\UsefulLink');
    }
}
