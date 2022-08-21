<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSheet extends Model
{
    protected $fillable = ['arabic_value' ,'english_value','active' ,'arabic_name','english_name','product_id'];
}
