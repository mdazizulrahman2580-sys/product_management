<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        $billing = [
            'address' => $this->faker->streetAddress(),
            'city'    => $this->faker->city(),
            'state'   => $this->faker->state(),
            'zip'     => $this->faker->postcode(),
        ];

        $shipping = [
            'address' => $this->faker->streetAddress(),
            'city'    => $this->faker->city(),
            'state'   => $this->faker->state(),
            'zip'     => $this->faker->postcode(),
        ];

        $subtotal      = $this->faker->numberBetween(200, 3000);
        $shippingCost  = $this->faker->numberBetween(40, 100);
        $tax           = $this->faker->numberBetween(10, 50);
        $discount      = $this->faker->numberBetween(0, 200);
        $grandTotal    = $subtotal + $shippingCost + $tax - $discount;

        return [
            'user_id'          => null,
            'customer_name'    => $this->faker->name(),
            'customer_email'   => $this->faker->safeEmail(),
            'customer_phone'   => $this->faker->phoneNumber(),

            'billing_address'  => $billing,
            'shipping_address' => $shipping,

            'payment_method'   => $this->faker->randomElement(['cod', 'stripe', 'paypal']),
            'payment_status'   => $this->faker->randomElement(['pending', 'paid', 'failed']),
            'transaction_id'   => $this->faker->uuid(),

            'status'           => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered']),

            'subtotal'         => $subtotal,
            'shipping_cost'    => $shippingCost,
            'tax'              => $tax,
            'discount'         => $discount,
            'grand_total'      => $grandTotal,

            'notes'            => $this->faker->sentence(),
            'coupon_code'      => $this->faker->randomElement([null, 'SAVE10', 'DISCOUNT5']),

            'shipping_method'  => $this->faker->randomElement(['standard', 'express']),
            'tracking_number'  => $this->faker->optional()->uuid(),
        ];
    }
}
