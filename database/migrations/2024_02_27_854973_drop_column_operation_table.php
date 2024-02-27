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
        Schema::table('operation', function (Blueprint $table) {
            $table->dropColumn('observation_admin');
            $table->dropColumn('observation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operation', function (Blueprint $table) {
            $table->text('observation_admin')->nullable();
            $table->text('observation')->nullable();
        });
    }
};
