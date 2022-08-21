<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
     protected $fillable = [
        'arabic_name','english_name','arabic_value', 'english_value', 'active',
    ];
}
