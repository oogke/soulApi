<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'location', 
        'category','district','image1','image2','image3','image4','image5'
    ];
}
