<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id')->index();
            // product snapshot fields (store snapshot to keep historic accuracy)
            $table->unsignedBigInteger('product_id')->nullable()->index();
            $table->string('product_name');
            $table->string('sku')->nullable();
            $table->json('variant')->nullable(); // e.g. {"size":"L","color":"red"}

            $table->integer('quantity')->unsigned()->default(1);
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->decimal('total_price', 12, 2)->default(0); // unit_price * quantity

            $table->text('meta')->nullable(); // optional free-form JSON or text

            $table->timestamps();

            // Foreign keys (optional)
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
