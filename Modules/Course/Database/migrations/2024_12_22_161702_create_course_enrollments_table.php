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
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->integer('student_id');
            $table->decimal('sub_total_amount', 8, 2)->default(0.00);
            $table->decimal('coupon_amount', 8, 2)->default(0.00);
            $table->decimal('total_amount', 8, 2)->default(0.00);
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('transaction_id');
            $table->string('order_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrollments');
    }
};
