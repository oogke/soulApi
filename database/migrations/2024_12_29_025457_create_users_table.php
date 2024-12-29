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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('firstname'); 
            $table->string('lastname'); 
            $table->string('email')->unique(); 
            $table->string('password'); 
            $table->string('address')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->string('country')->nullable(); 
            $table->string('citizenshipNo')->unique()->nullable(); 
            $table->string('profile', 400)->nullable(); // Profile image URL or path
            $table->string('citizenCardFront', 400)->nullable(); // Front image of citizen card
            $table->string('citizenCardBack', 400)->nullable(); // Back image of citizen card
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
