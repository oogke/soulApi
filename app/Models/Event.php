<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=["name","description","location","district","start_date","end_date","start_time","end_time","category","image1","image2","image3","image4","image5","organizer","phone","email","ticket_price"];
}
