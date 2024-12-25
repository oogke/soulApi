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
        Schema::table('cafes', function (Blueprint $table) {
            // Drop the old foreign key constraint
            if (Schema::hasColumn('cafes', 'district_id')) {
                $table->dropForeign(['district_id']);
                $table->dropColumn('district_id');
            }
            // Add the new foreign key column (as district_id)
            $table->string('district'); // Add the new foreign key column

            // Add the foreign key constraint to reference the 'name' column in 'districts' table
            $table->foreign('district')
                ->references('name') // Reference the 'name' column of the 'districts' table
                ->on('districts') // Reference the 'districts' table
                ->onDelete('cascade') // Cascade delete if district is deleted
                ->onUpdate('cascade'); // Cascade update if district is updated
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
