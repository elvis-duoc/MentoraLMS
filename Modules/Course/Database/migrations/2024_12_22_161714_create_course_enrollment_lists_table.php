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
        Schema::create('course_enrollment_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('course_enrollment_id');
            $table->integer('instructor_id');
            $table->integer('course_id');
            $table->decimal('total_amount', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrollment_lists');
    }
};
