<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablet extends Model
{
    use HasFactory;
    protected $table='tablets';
    protected $fillable =
    [
        'name',
        'size',
        'brand',
        'price',
        'quantity',
    ];
}
