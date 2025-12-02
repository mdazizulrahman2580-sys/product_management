<?php

use Carbon\Traits\Timestamp;
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
            $table->string('name')->nullable();
            $table->json('colors')->nullable();
            $table->json('sizes')->nullable();
            $table->decimal('selling_price', 10, 2)->default(0);
            $table->string('main_image')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discount_price', 10, 2)->nullable();

            $table->integer('stock')->default(0);   
            $table->string('image')->nullable();  // thumbnail
            $table->string('avatar')->nullable();
            $table->longText('description')->nullable();

            $table->tinyInteger('status')->default(1); // 1 = Active, 0 = Inactive
            $table->json('images')->nullable();
            $table->string('mainTitle')->nullable();
            $table->decimal('mainPrice', 10, 2)->nullable();
            $table->text('mainDescription')->nullable();

           
         // Main Image
        $table->string('image_1')->nullable();  // Second Image
        $table->string('image_2')->nullable();  // Third Image

        // DATA FOR IMAGE 1
        $table->string('title_1')->nullable();
        $table->decimal('price_1', 10, 2)->nullable();
        $table->text('description_1')->nullable();

        // DATA FOR IMAGE 2
        $table->string('title_2')->nullable();
        $table->decimal('price_2', 10, 2)->nullable();
        $table->text('description_2')->nullable();


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
