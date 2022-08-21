<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    //
     protected $fillable = [
        'image', 'arabic_desc','english_desc','name','number', 'active',
    ];
}
