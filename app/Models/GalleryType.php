<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryType extends Model
{
    protected $fillable = ['arabic_name' ,'english_name','active'];


    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }
}
