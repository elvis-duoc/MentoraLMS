<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Use raw SQL to alter column type to nullable to avoid requiring doctrine/dbal
        DB::statement("ALTER TABLE `course_enrollments` MODIFY `transaction_id` VARCHAR(255) NULL;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ensure no NULL values before making NOT NULL again
        DB::statement("UPDATE `course_enrollments` SET `transaction_id` = '' WHERE `transaction_id` IS NULL;");
        DB::statement("ALTER TABLE `course_enrollments` MODIFY `transaction_id` VARCHAR(255) NOT NULL;");
    }
};
