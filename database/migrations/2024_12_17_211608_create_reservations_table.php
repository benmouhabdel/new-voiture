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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing primary key
            $table->timestamps(); // Adds created_at and updated_at columns
            
            // Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('phone_number');
            
            // Car Reservation Details
            $table->unsignedBigInteger('car_id')->nullable();
            $table->date('reservation_date_start')->nullable();
            $table->date('reservation_date_end')->nullable();
            
            // Optional fields
            $table->string('national_id_photo')->nullable();
            
            // Foreign key constraint
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};