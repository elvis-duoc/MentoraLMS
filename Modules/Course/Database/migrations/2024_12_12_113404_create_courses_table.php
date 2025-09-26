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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('user_id');
           
            $table->integer('total_seat')->default(0);
            $table->integer('total_lesson')->default(0);
            $table->string('total_duration')->nullable();
 
            $table->integer('category_id')->default(0);
            $table->integer('course_level_id')->default(0);
            $table->integer('course_language_id')->default(0);

            $table->string('thumb_image')->nullable();
            $table->text('preview_video_id')->nullable();

            $table->decimal('regular_price', 8, 2)->nullable()->default(0.00);
            $table->decimal('offer_price', 8, 2)->nullable();

            $table->enum('is_certificate', ['enable', 'disable'])->default('disable');
            $table->enum('is_popular', ['enable', 'disable'])->default('disable');
            $table->enum('is_featured', ['enable', 'disable'])->default('disable');
            $table->enum('is_new', ['enable', 'disable'])->default('disable');

            $table->enum('status', ['enable', 'disable'])->default('disable');
            $table->enum('approved_by_admin', ['approved', 'pending', 'rejected', 'draft'])->default('draft');

            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
