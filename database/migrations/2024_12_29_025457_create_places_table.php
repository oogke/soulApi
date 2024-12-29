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
        Schema::create('places', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID
            $table->string('name'); // Place name
            $table->json('category'); // Category in JSON format
            $table->string('description'); // Description of the place
            $table->string('location'); // Location of the place
            $table->string('image1', 400); // Image 1 with a length of 400
            $table->string('image2', 400); // Image 2 with a length of 400
            $table->string('image3', 400); // Image 3 with a length of 400
            $table->string('image4', 400); // Image 4 with a length of 400
            $table->string('image5', 400); // Image 5 with a length of 400
            $table->string('district'); // District of the place
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
