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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID
            $table->string('name'); // Cafe name
            $table->text('description'); // Cafe description
            $table->string('location'); // Cafe location
            $table->string('phone'); // Cafe phone number
            $table->string('email')->unique(); // Cafe email address
            $table->string('website')->nullable(); // Cafe website (nullable)
            $table->string('district'); // Cafe district
            $table->string('image1', 400); // Image 1 (string with length of 400)
            $table->string('image2', 400); // Image 2 (string with length of 400)
            $table->string('image3', 400); // Image 3 (string with length of 400)
            $table->string('image4', 400); // Image 4 (string with length of 400)
            $table->string('image5', 400); // Image 5 (string with length of 400)
            $table->decimal('rating', 3, 2)->nullable(); // Rating (decimal with 0.00 to 4.99 range)
            $table->timestamps(); //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};
