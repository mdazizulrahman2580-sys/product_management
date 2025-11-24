<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderItem;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        $unitPrice = $this->faker->numberBetween(100, 1000);
        $qty       = $this->faker->numberBetween(1, 5);

        return [
            'product_id'   => null,
            'product_name' => $this->faker->words(2, true),
            'sku'          => strtoupper($this->faker->bothify('SKU-###??')),
            'variant'      => [
                'size'  => $this->faker->randomElement(['S', 'M', 'L']),
                'color' => $this->faker->safeColorName(),
            ],
            'quantity'     => $qty,
            'unit_price'   => $unitPrice,
            'total_price'  => $unitPrice * $qty,
            'meta'         => null,
        ];
    }
}
