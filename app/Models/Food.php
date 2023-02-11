<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    function material(){
        return $this->belongsToMany(Material::class)->withPivot('amount','id');
    }
    protected $table = 'foods';
}

