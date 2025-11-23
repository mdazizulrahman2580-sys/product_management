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

            'price' => $this->faker->randomFloat(2, 100, 10000),
            'discount_price' => $this->faker->optional()->randomFloat(2, 50, 5000),

            'stock' => $this->faker->numberBetween(0, 500),

            'image' => $this->faker->imageUrl(600, 600, 'product'),

            'description' => $this->faker->paragraph(5),

            'status' => 1,
        ];
    }
}
