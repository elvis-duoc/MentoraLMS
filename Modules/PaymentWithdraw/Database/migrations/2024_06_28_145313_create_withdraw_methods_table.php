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
        Schema::create('withdraw_methods', function (Blueprint $table) {
            $table->id();
            $table->string('method_name');
            $table->decimal('min_amount', 8, 2)->default(0.00);
            $table->decimal('max_amount', 8, 2)->default(0.00);
            $table->decimal('withdraw_charge', 8, 2)->default(0.00);
            $table->text('description');
            $table->string('status')->default('disable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw_methods');
    }
};
