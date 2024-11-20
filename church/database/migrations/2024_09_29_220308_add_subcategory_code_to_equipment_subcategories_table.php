<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubcategoryCodeToEquipmentSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipment_subcategories', function (Blueprint $table) {
            $table->string('subcategory_code', 2)->unique()->after('subcategory_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipment_subcategories', function (Blueprint $table) {
            $table->dropColumn('subcategory_code');
        });
    }
}
