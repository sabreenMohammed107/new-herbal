<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
  protected $fillable = ['arabic_name' ,'english_name','active','image'];

  public function products() {
        return $this->hasMany('App\Models\Product');
    }
}
