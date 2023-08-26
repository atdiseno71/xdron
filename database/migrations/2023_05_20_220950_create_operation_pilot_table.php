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
        Schema::create('operation_pilot', function (Blueprint $table) {
            $table->id();

            $table->string('descarga')->nullable();
            $table->date('fecha_ejecucion');

            /* $table->unsignedBigInteger('id_cliente')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_cliente')
                ->references('id')
                ->on('cliente');

            $table->unsignedBigInteger('id_finca')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_finca')
                ->references('id')
                ->on('finca');

            $table->unsignedBigInteger('zona_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('zona_id')
                ->references('id')
                ->on('zonas');

            $table->unsignedBigInteger('id_suerte')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_suerte')
                ->references('id')
                ->on('suerte');

            $table->unsignedBigInteger('id_piloto')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_piloto')
                ->references('id')
                ->on('users'); */

            $table->string('evidencia_record')->nullable();
            $table->string('evidencia_track')->nullable();
            $table->string('evidencia_gps')->nullable();
            $table->text('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_pilot');
    }
};
