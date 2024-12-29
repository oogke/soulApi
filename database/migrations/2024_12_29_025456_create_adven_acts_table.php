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
        Schema::create('adven_acts', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID
            $table->string('name'); // Adventure activity name
            $table->string('district'); // District for the activity
            $table->text('description'); // Description of the activity
            $table->string('price'); // Price for the activity
            $table->string('duration'); // Duration of the activity (in hours or days)
            $table->json('requirements'); // Requirements for the activity in JSON format
            $table->string('image1', 400); // Image 1 (URL or path)
            $table->string('image2', 400); // Image 2
            $table->string('image3', 400); // Image 3
            $table->string('image4', 400); // Image 4
            $table->string('image5', 400); // Image 5
            $table->boolean('is_seasonal'); // Whether the activity is seasonal or not
            $table->json('best_season'); // Best season(s) for the activity in JSON format
            $table->string('location'); // Location of the activity
            $table->string('email')->unique(); // Contact email for the activity
            $table->string('phone'); // Contact phone number for the activity
            $table->string('website')->nullable(); // Website for the activity or company
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adven_acts');
    }
};
