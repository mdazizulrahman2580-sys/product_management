<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::lower(Str::random(5)),

            // category_id যদি থাকে
            'category_id' => rand(1, 5),
            'name' => $this->faker->optional()->sentence(2),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'discount_price' => $this->faker->optional()->randomFloat(2, 50, 5000),

            'stock' => $this->faker->numberBetween(0, 500),

            'avatar' => $this->faker->imageUrl(600, 600, 'product'),

            'image' => $this->faker->imageUrl(600, 600, 'product'),

            'description' => $this->faker->paragraph(5),
            
            'status' => 1,
            'colors' => $this->faker->randomElements(['Red', 'Blue', 'Green', 'Black', 'White'], rand(1, 5)),
            'sizes' => $this->faker->randomElements(['S', 'M', 'L', 'XL', 'XXL'], rand(1, 5)),  
            'main_image' => $this->faker->imageUrl(800, 800, 'product'),
            'mainTitle' => $this->faker->sentence(3),
            'mainPrice' => $this->faker->randomFloat(2, 100, 10000),
            'mainDescription' => $this->faker->paragraph(4),

            'selling_price' => $this->faker->randomFloat(2, 80, 9000),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'images' => [
                $this->faker->imageUrl(600, 600, 'product'),
                $this->faker->imageUrl(600, 600, 'product'),
                $this->faker->imageUrl(600, 600, 'product'),
            ],
            'image_1' => $this->faker->imageUrl(600, 600, 'product'),
            'title_1' => $this->faker->sentence(3),
            'price_1' => $this->faker->randomFloat(2, 50, 5000),
            'description_1' => $this->faker->paragraph(3),

            'image_2' => $this->faker->imageUrl(600, 600, 'product'),
            'title_2' => $this->faker->sentence(3),
            'price_2' => $this->faker->randomFloat(2, 50, 5000),
            'description_2' => $this->faker->paragraph(3),
            
        ];
    }
}
