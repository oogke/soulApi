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
        Schema::create('vehicle_hubs', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID
            $table->string('name'); // Vehicle hub name
            $table->text('description'); // Vehicle hub description
            $table->string('location'); // Vehicle hub location
            $table->string('phone'); // Vehicle hub phone number
            $table->string('email')->unique(); // Vehicle hub email address
            $table->string('website')->nullable(); // Vehicle hub website (nullable)
            $table->string('district'); // Vehicle hub district
            $table->string('image1', 400); // Image 1 (string with length of 400)
            $table->string('image2', 400); // Image 2 (string with length of 400)
            $table->string('image3', 400); // Image 3 (string with length of 400)
            $table->string('image4', 400); // Image 4 (string with length of 400)
            $table->string('image5', 400); // Image 5 (string with length of 400)
            $table->decimal('rating', 3, 2)->nullable(); // Rating (decimal with 0.00 to 4.99 range)
            $table->json('vehicles'); // Vehicles (JSON column)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_hubs');
    }
};
