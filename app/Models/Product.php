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
        'avatar',
        'description',
        'status',
        'colors',
        'sizes',
        'main_image',
        'selling_price',
        'rating',
        'image',
        'mainTitle',
        'mainPrice',
        'mainDescription',
        'images',

        'image_1',
        'title_1',
        'price_1',
        'description_1',


        'image_2',
        'title_2',
        'price_2',
        'description_2',    
        
      ];
      protected $casts = [
    'images' => 'array',
    'colors' => 'array',
    'sizes'  => 'array',
    'main_image' => 'array',
    'selling_price' => 'decimal:2',
    'rating' => 'decimal:2',
    'price' => 'decimal:2',
    'discount_price' => 'decimal:2',
    
];




}

