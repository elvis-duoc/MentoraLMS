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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('video_source')->default('youtube');
        });

        Schema::table('course_module_lessons', function (Blueprint $table) {
            $table->string('video_source')->default('youtube');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('video_source');
        });

        Schema::table('course_module_lessons', function (Blueprint $table) {
            $table->dropColumn('video_source');
        });

        
    }
};
