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
        Schema::create('aeronave', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_cliente')
                ->references('id')
                ->on('cliente');
            $table->string('matricula');
            $table->date('poliza_inicio');
            $table->date('poliza_fin');
            $table->date('cert_matricula_inicio');
            $table->date('cert_matricula_fin');
            $table->date('cert_aereonavegabilidad_inicio');
            $table->date('cert_aereonavegabilidad_fin');
            $table->date('antinarcoticos_inicio');
            $table->date('antinarcoticos_fin');
            $table->string('archivo_aereonave');
            $table->string('login');
            $table->date('fechasys');
            $table->string('archivo_poliza');
            $table->string('archivo_cert_matricula');
            $table->string('archivo_avion');
            $table->string('archivo_cert_aereonavegabilidad');
            $table->string('archivo_antinarcoticos');
            $table->date('direccional_estupefacientes_inicio');
            $table->date('direccional_estupefacientes_fin');
            $table->string('archivo_direccional');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aeronave');
    }
};
