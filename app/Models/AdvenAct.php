<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AdvenAct extends Model
{
    protected $fillable=[
'name','district','description','price','duration','requirements','image1','image2','image3'
,'image4','image5','is_seasonal','best_season','location','email','phone','website'];
}
