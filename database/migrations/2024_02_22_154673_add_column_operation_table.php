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
            $table->text('evidence_record')->nullable();
            $table->text('evidence_aplication')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operation', function (Blueprint $table) {
            $table->dropColumn('evidence_record');
            $table->dropColumn('evidence_aplication');
        });
    }
};