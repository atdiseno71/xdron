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
        Schema::create('item_factura_inventario', function (Blueprint $table) {
            $table->id();
            $table->string('id_factura');
            $table->string('id_repuesto');
            $table->string('cantidad');
            $table->string('valor');
            $table->string('iva')->nullable();
            $table->date('fecha');
            $table->unsignedBigInteger('id_grupo')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_grupo')
                ->references('id')
                ->on('grupo');

            $table->unsignedBigInteger('id_subgrupo')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_subgrupo')
                ->references('id')
                ->on('subgrupo_inventario');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_factura_inventario');
    }
};
