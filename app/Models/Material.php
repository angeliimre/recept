<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    function measure(){
        return $this->belongsTo(Measure::class);
    }
    function food(){
        return $this->belongsToMany(Food::class);
    }

}
