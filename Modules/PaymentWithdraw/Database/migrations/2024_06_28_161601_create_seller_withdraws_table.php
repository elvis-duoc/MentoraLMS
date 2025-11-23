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
        Schema::create('seller_withdraws', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->integer('withdraw_method_id');
            $table->string('withdraw_method_name');
            $table->decimal('total_amount', 8, 2)->default(0.00);
            $table->decimal('withdraw_amount', 8, 2)->default(0.00);
            $table->decimal('charge_amount', 8, 2)->default(0.00);
            $table->text('description');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_withdraws');
    }
};
