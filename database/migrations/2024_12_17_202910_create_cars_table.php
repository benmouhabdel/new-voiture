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
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('marque');
        $table->string('model');
        $table->string('description');
        $table->integer('price_per_day');  
        $table->enum('automatique', ['0', '1'])->default('0');
        $table->enum('diesel', ['0', '1'])->default('0');
        $table->integer('place');
        $table->timestamps();
    });

    Schema::create('car_photos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('car_id')->constrained()->onDelete('cascade');
        $table->string('photo_path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_photos');
        Schema::dropIfExists('cars');
    }
};
