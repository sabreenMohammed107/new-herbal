<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
     protected $fillable = [
        'arabic_review', 'english_review', 'active',
    ];
    //
}
