<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Create 30 fake orders
        Order::factory()
            ->count(30)
            ->create()
            ->each(function ($order) {
                // Each order gets 1-5 random items
                OrderItem::factory()
                    ->count(rand(1, 5))
                    ->create([
                        'order_id' => $order->id,
                    ]);

                // Recalculate totals after items created
                $order->recalculateTotals();
            });
    }
}

