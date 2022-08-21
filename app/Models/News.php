<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['arabic_name' ,'english_name','active','arabic_desc','english_desc','image'];

     public function newsPoints()
    {
        return $this->hasMany('App\Models\NewsPoint');
    }
}
