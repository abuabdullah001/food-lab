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
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->longText('product_description')->nullable();
            $table->decimal('price', 10, 2);
            $table->foreignId('cuisine_id')->constrained('cuisines')->onDelete('cascade');
            $table->longText('ingredients')->nullable();
            $table->enum('pre_order', ['active', 'deactive']);
            $table->enum('always_avaialable', ['active', 'deactive']);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
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
