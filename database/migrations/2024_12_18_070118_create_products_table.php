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
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('product_type', ['simple', 'attribute'])->default('simple');

            $table->text('sort_description')->nullable();
            $table->longText('long_description')->nullable();

            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('product_price', 10, 2)->default(0.00);
            $table->decimal('discount_rate', 5, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->default(0.00);
            $table->decimal('gst_rate', 5, 2)->nullable();
            $table->decimal('gst_amount', 10, 2)->default(0.00);
            $table->decimal('total_price', 10, 2)->default(0.00);
            $table->string('stock')->default(0);
            $table->string('sku')->nullable();

            $table->tinyInteger('is_special')->default(0);
            $table->tinyInteger('is_visible')->default(0);
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
