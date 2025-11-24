<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // If you have users:
            $table->unsignedBigInteger('user_id')->nullable()->index();

            // Basic customer info (store snapshot even if user deleted)
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();

            // Addresses as JSON snapshot
            $table->json('billing_address')->nullable();
            $table->json('shipping_address')->nullable();

            // Payment
            $table->string('payment_method')->nullable(); // e.g. 'stripe', 'paypal', 'cod'
            $table->string('payment_status')->default('pending'); // pending, paid, failed, refunded
            $table->string('transaction_id')->nullable();

            // Order status
            $table->string('status')->default('pending'); // pending, processing, shipped, delivered, cancelled, refunded

            // Price breakdown
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('grand_total', 12, 2)->default(0);

            // Other
            $table->text('notes')->nullable(); // admin/customer note
            $table->string('coupon_code')->nullable();

            // Shipping / tracking
            $table->string('shipping_method')->nullable();
            $table->string('tracking_number')->nullable();

            // Soft deletes if you want
            $table->softDeletes();

            $table->timestamps();

            // Foreign key (optional). Uncomment if users table exists and you want FK constraint:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

