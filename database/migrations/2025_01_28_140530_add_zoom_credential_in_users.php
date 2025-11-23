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
            $table->string('zoom_api_key')->nullable();
            $table->string('zoom_api_secret')->nullable();
            $table->string('zoom_token_expiry')->nullable();
            $table->text('zoom_access_token')->nullable();
            $table->text('zoom_refresh_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('zoom_api_key');
            $table->dropColumn('zoom_api_secret');
            $table->dropColumn('zoom_token_expiry');
            $table->dropColumn('zoom_access_token');
            $table->dropColumn('zoom_refresh_token');
        });
    }
};
