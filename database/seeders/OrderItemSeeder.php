<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        // If no orders exist, skip seeding
        if (Order::count() === 0) {
            $this->command->warn("⚠ No orders found! Run OrderSeeder first.");
            return;
        }

        // Random items count
        $itemsCount = rand(50, 200);

        OrderItem::factory()
            ->count($itemsCount)
            ->make() // make = temporarily create instances (not inserted yet)
            ->each(function ($item) {
                $item->order_id = Order::inRandomOrder()->value('id'); // attach to random order
                $item->save(); // now insert into DB
            });

        $this->command->info("✅ Seeded {$itemsCount} Order Items successfully!");
    }
}
