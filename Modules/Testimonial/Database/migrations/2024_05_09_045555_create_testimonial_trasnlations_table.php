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
        Schema::create('testimonial_trasnlations', function (Blueprint $table) {
            $table->id();
            $table->integer('testimonial_id');
            $table->string('lang_code');
            $table->string('name');
            $table->string('designation');
            $table->text('comment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial_trasnlations');
    }
};
