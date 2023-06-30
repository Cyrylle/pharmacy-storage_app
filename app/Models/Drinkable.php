<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drinkable extends Model
{
    use HasFactory;
    protected $table='drinkables';
    protected $fillable =
    [
        'name',
        'size',
        'brand',
        'price',
        'quantity',
    ];
}
