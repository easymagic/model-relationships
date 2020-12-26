<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    function continent(){
        return $this->belongsTo(Continent::class,'continent_id');
    }

    function states(){
       return $this->hasMany(State::class,'country_id');
    }
}
