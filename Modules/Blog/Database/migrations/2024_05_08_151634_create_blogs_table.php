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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('image');
            $table->integer('admin_id')->default(0);
            $table->integer('blog_category_id');
            $table->integer('views')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('show_homepage')->default('no');
            $table->string('is_popular')->default('no');
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
