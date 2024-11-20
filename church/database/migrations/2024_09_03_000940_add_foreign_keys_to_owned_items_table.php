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
            // Add foreign key columns
            $table->unsignedBigInteger('supplier_id')->nullable()->after('location');
            $table->unsignedBigInteger('customer_id')->nullable()->after('supplier_id');
            $table->unsignedBigInteger('donor_id')->nullable()->after('customer_id');
            $table->unsignedBigInteger('donated_to_id')->nullable()->after('donor_id');

            // Add foreign key constraints
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('set null');
            $table->foreign('donated_to_id')->references('id')->on('donated_tos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('owned_items', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['donor_id']);
            $table->dropForeign(['donated_to_id']);

            // Drop columns
            $table->dropColumn(['supplier_id', 'customer_id', 'donor_id', 'donated_to_id']);
        });
    }
};
