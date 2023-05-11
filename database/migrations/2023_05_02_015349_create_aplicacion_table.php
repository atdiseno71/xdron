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
        Schema::create('aplicacion', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cliente')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_cliente')
                ->references('id')
                ->on('cliente');

            $table->unsignedBigInteger('id_producto')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_producto')
                ->references('id')
                ->on('producto');

            $table->string('matricula')->unique();
            $table->date('fecha');
            $table->string('hora_salida')->nullable();
            $table->string('hora_llegada')->nullable();
            $table->string('consumo_combustible');
            $table->string('tanqueador')->nullable();
            $table->string('horas_vuelo');
            $table->string('aterrizajes');
            $table->string('hectareas');
            $table->string('archivo_aplicacion')->nullable();
            $table->string('archivo_track')->nullable();
            $table->string('archivo_record')->nullable();
            $table->string('archivo_mapa')->nullable();
            $table->string('otro_archivo')->nullable();
            $table->string('observacion_piloto')->nullable();
            $table->string('observacion_cliente')->nullable();
            $table->unsignedBigInteger('id_user')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
            $table->string('descarga');
            $table->string('tipo_app');
            $table->string('archivo_factura')->nullable();
            $table->string('valor_factura')->nullable();
            $table->string('comprobante')->nullable();
            $table->string('observacion_factura')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplicacion');
    }
};
