<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMaterial extends Model
{
    use HasFactory;
    protected $fillable=[
        "food_id",
        "material_id",
        "amount"
    ];
    protected $table = 'food_material';
}
