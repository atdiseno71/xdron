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
        Schema::create('servicio', function (Blueprint $table) {
            $table->id();
            $table->string('num_servicio')->unique();
            $table->string('id_servicio')->unique();
            $table->string('matricula')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_entrega');
            $table->string('responsable');
            $table->string('supervisor');
            $table->string('nota')->nullable();
            $table->string('horometro_ingresado');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
