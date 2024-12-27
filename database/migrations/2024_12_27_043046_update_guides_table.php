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
        Schema::table('guides', function(Blueprint $table)
        {
$table->dropColumn("certificates");
$table->dropColumn("certification");
$table->string('GOVcertificate',400)->nullable();
$table->string("address");
$table->string("profile",400)->nullable();
$table->string("citizenCardFront",400)->nullable();
$table->string("citizenCardBack",400)->nullable();
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
