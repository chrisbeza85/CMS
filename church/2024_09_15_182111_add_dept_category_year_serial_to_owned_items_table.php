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
        Schema::table('owned_items', function (Blueprint $table) {
            //barcode format
            $table->string('dept_code', 3)->after('id'); //dept code (AAA)
            $table->unsignedBigInteger('category_id')->after('dept_code'); //equipment category (BB)
            $table->year('year_bought')->after('category_id'); //year bought (CCCC)
            $table->string('serial_number', 6)->after('year_bought'); //serial number (XXXXXX)

            //foreign key relationship for category_id with equipment_categories table
            $table->foreign('category_id')->references('id')->on('equipment_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('owned_items', function (Blueprint $table) {
            $table->dropColumn('dept_code');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('year_bought');
            $table->dropColumn('serial_number');
        });
    }
};
