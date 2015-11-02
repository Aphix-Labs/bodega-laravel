<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'brand',
        'category',
        'quantity',
        'price',
    ];
}
