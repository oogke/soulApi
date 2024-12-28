<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
protected $fillable=["firstname","lastname","email","phone","dob","country","citizenshipNo","experience","website","GOVcertificate","languages","CV","profile","address","citizenCardFront","citizenCardBack"];
}
