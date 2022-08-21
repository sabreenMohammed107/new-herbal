<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['arabic_name', 'english_name', 'active', 'arabic_overview', 'english_overview', 'image', 'video', 'arabic_desc', 'english_desc', 'price', 'product_category_id','link_name','link_value',
        'link_arabic_name','link_arabic_value'
        ];

    public function productSheets() {
        return $this->hasMany('App\Models\ProductSheet');
    }

    public function productImages() {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function ProductCategory() {
        return $this->belongsTo('App\Models\ProductCategory');
    }

}
