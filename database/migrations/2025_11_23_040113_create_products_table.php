<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
               $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->unsignedBigInteger('category_id')->nullable(); // category table থাকলে FK হবে

            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discount_price', 10, 2)->nullable();

            $table->integer('stock')->default(0);

            $table->string('image')->nullable();  // thumbnail

            $table->longText('description')->nullable();

            $table->tinyInteger('status')->default(1); // 1 = Active, 0 = Inactive

            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
