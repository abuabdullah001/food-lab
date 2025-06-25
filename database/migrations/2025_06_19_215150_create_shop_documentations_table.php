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
        Schema::create('shop_documentations', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('proof_of_id')->nullable()->comment('nullable');
            $table->string('right_to_work')->nullable()->comment('nullable');
            $table->string('food_business_registration')->nullable()->comment('nullable');
            $table->string('vehicle')->nullable()->comment('nullable');
            $table->string('hmrc_tax_reference')->nullable()->comment('nullable');
            $table->string('business_insurance_car')->nullable()->comment('nullable');
            $table->string('allergen_training')->nullable()->comment('nullable');
            $table->string('thermal_insulation_kit')->nullable()->comment('nullable');
            $table->string('waste_management_compliance')->nullable()->comment('nullable');
            $table->string('safety_training')->nullable()->comment('nullable');
            $table->string('safety_management_system')->nullable()->comment('nullable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_documentations');
    }
};
