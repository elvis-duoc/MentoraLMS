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
        Schema::create('course_module_lessons', function (Blueprint $table) {
            $table->id();
            $table->integer('course_module_id');
            $table->text('name');
            $table->text('video_id')->nullable();
            $table->string('video_duration')->comment('count as a minute');
            $table->integer('serial')->default(1);
            $table->enum('is_public_lesson', ['enable', 'disable'])->default('disable');
            $table->enum('status', ['enable', 'disable'])->default('disable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_module_lessons');
    }
};
