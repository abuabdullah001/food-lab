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
        Schema::create('billing_information', function (Blueprint $table) {
        $table->id();
        $table->integer('order_id')->nullable()->comment('Order ID associated with the billing information');

        // Billing fields (as per your DBML)
        $table->string('name', 100)->nullable();
        $table->string('email', 100)->nullable();
        $table->string('phone', 20)->nullable();
        $table->text('address')->nullable();
        $table->string('city', 50)->nullable();
        $table->string('state', 50)->nullable();
        $table->string('zip_code', 20)->nullable();
        $table->string('country', 50)->nullable();

        // Payment info
        $table->string('payment_method', 50)->nullable(); 
        $table->string('payment_status', 20)->default('pending'); 
        $table->string('transaction_id', 100)->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_information');
    }
};
