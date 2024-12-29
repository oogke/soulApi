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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID
            $table->string('name'); // Event name
            $table->text('description'); // Event description
            $table->string('location'); // Event location
            $table->string('district'); // Event district
            $table->date('start_date'); // Event start date
            $table->date('end_date'); // Event end date
            $table->time('start_time'); // Event start time
            $table->time('end_time'); // Event end time
            $table->string('category'); // Event category
            $table->string('image1', 400); // Event image 1
            $table->string('image2', 400); // Event image 2
            $table->string('image3', 400); // Event image 3
            $table->string('image4', 400); // Event image 4
            $table->string('image5', 400); // Event image 5
            $table->json('organizer'); // Event organizer
            $table->string('phone'); // Organizer's phone number
            $table->string('email'); // Organizer's email
            $table->string('ticket_price'); // Event ticket price (decimal type)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
