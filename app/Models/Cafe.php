<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $fillable =["name","description","location","phone","email","website","image1","image2","image3","image4","image5","rating","district"];
}
