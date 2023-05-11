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
        Schema::create('compra_inventario', function (Blueprint $table) {
            $table->id();
            $table->string('id_factura');
            $table->string('saldo');
            $table->string('monto');
            $table->date('fecha_inicio');
            $table->string('observacion')->nullable();
            $table->date('fecha_pago');
            $table->string('estado');

            $table->unsignedBigInteger('id_user')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_inventario');
    }
};
