<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'user_id'    => null,
            'product_id' => null,
            'quantity'   => $this->faker->numberBetween(1, 10),
            'color'      => $this->faker->safeColorName(),
            'size'       => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'price'      => $this->faker->numberBetween(100, 1000),
            'image'      => $this->faker->imageUrl(640, 480, 'products', true),
            'title'      => $this->faker->sentence(3),
            'total'      => function (array $attributes) {
                return $attributes['price'] * $attributes['quantity'];
            },

        ];
    }
}
