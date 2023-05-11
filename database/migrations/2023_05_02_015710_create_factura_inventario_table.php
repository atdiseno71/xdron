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
        Schema::create('factura_inventario', function (Blueprint $table) {
            $table->id();
            $table->string('id_proveedor');
            $table->date('fecha');
            $table->string('total');
            $table->string('archivo_factura')->nullable();
            $table->string('no_factura');
            $table->string('estado');
            $table->date('fecha_vencimiento')->nullable();
            $table->string('observacion')->nullable();

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
        Schema::dropIfExists('factura_inventario');
    }
};
