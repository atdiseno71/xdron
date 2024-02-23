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
            $table->unsignedBigInteger('dron_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('dron_id')
                ->references('id')
                ->on('dron');

            $table->unsignedBigInteger('zone_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('zone_id')
                ->references('id')
                ->on('zones');

            $table->string('number_flights')->nullable();
            $table->string('hour_flights')->nullable();
            $table->string('download')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operation', function (Blueprint $table) {
            // Relacion dron
            $table->dropForeign(['dron_id']);
            $table->dropColumn('dron_id');
            // Relacion dron
            $table->dropForeign(['zone_id']);
            $table->dropColumn('zone_id');
            // Eliminar resto de columnas
            $table->dropColumn('number_flights');
            $table->dropColumn('hour_flights');
            $table->dropColumn('download');
        });
    }
};
