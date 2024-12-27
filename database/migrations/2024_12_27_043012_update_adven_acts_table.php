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
        Schema::table('adven_acts', function(Blueprint $table)
        {
$table->dropColumn("images");
$table->string('image1',400)->nullable();
$table->string('image2',400)->nullable();
$table->string('image3',400)->nullable();
$table->string('image4',400)->nullable();
$table->string('image5',400)->nullable();
$table->string("location");
$table->string('phone')->unique();
$table->string('email')->unique();
$table->string('website')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
