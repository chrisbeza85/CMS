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
        Schema::create('human_resources', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('mobile', 10)->nullable();
            $table->string('ministry');
            $table->string('birthday');
            $table->string('pay');
            $table->string('occupation');
            $table->string('gender');
            $table->string('marital');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('registrationdate')->nullable();        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('human_resources');
    }
};
