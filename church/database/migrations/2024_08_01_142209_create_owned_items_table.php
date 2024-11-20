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
        Schema::create('owned_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->enum('status', [
                'Stored',
                'Lost',
                'Damaged',
                'Outbound',
                'Inbound',
                'Donated',
                'Received',
            ])->change(); // e.g., stored, lost, damaged
            $table->text('description')->nullable();  
            $table->string('barcode')->unique();
            $table->string('qr_code')->nullable();
            $table->decimal('item_value', 10, 2)->nullable();
            $table->enum('item_condition', ['new', 'used', 'good', 'fair', 'poor'])->default('new'); // Item condition
            $table->string('location')->nullable();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('donor_id')->nullable()->constrained('donors');
            $table->foreignId('donated_to_id')->nullable()->constrained('donated_tos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owned_items');
    }
};
