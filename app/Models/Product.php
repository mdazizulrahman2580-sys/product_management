<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
      protected $fillable = [

         'title',
        'slug',
        'category_id',
        'name',
        'price',
        'discount_price',
        'stock',
        'image',
        'avatar',
        'description',
        'status',

      ];
      protected $casts = [
    'images' => 'array',
    'colors' => 'array',
    'sizes'  => 'array',
];



}

