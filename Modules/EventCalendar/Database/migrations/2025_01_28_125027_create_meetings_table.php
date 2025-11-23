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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('meeting_id')->unique();
            $table->string('meeting_link');
            $table->text('description')->nullable();
            $table->integer('instructor_id');
            $table->integer('course_id')->default(0);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('duration')->nullable();
            $table->string('time_zone')->default('UTC');
            $table->string('platform')->default('zoom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
