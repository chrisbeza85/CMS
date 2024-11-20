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
        Schema::create('equipment_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('subcategory_name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('equipment_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_subcategories');
    }
};
