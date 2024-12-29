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
        Schema::create('guides', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID
            $table->string('firstname'); // Guide's first name
            $table->string('lastname'); // Guide's last name
            $table->string('email')->unique(); // Guide's email address (unique)
            $table->string('phone'); // Guide's phone number
            $table->date('dob'); // Guide's date of birth
            $table->string('country'); // Guide's country
            $table->string('citizenshipNo'); // Guide's citizenship number
            $table->json('experience'); // Guide's experience (JSON column)
            $table->string('website')->nullable(); // Guide's website (nullable)
            $table->string('GOVcertificate', 400); // Government certificate (string with length of 400)
            $table->json('languages'); // Guide's languages (JSON column)
            $table->string('CV', 400); // Guide's CV (string with length of 400)
            $table->string('profile', 400); // Guide's profile (string with length of 400)
            $table->string('address');
            $table->string('citizenCardFront', 400); // Citizen card front (string with length of 400)
            $table->string('citizenCardBack', 400); // Citizen card back (string with length of 400)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
