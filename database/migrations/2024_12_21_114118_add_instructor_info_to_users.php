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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('instructor_experience')->default(0);
            $table->text('skills_expertise')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->enum('instructor_joining_request', ['pending', 'approved', 'rejected', 'not_yet'])->default('not_yet');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('instructor_experience');
            $table->dropColumn('skills_expertise');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('facebook');
            $table->dropColumn('linkedin');
            $table->dropColumn('twitter');
            $table->dropColumn('instagram');
            $table->dropColumn('instructor_joining_request');
        });
    }
};
