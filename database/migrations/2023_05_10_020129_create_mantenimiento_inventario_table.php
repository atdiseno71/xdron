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
        Schema::create('mantenimiento_inventario', function (Blueprint $table) {
            $table->id();
            $table->string('id_inventario')->unique();
            $table->string('valor');
            $table->string('cantidad');

            $table->unsignedBigInteger('id_subgrupo')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_subgrupo')
                ->references('id')
                ->on('subgrupo_inventario');

            $table->unsignedBigInteger('id_grupoinventario')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_grupoinventario')
                ->references('id')
                ->on('grupo_inventario');

            $table->unsignedBigInteger('id_repuesto')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_repuesto')
                ->references('id')
                ->on('repuesto');

            $table->string('observacion');
            $table->string('medida');
            $table->date('fecha');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento_inventario');
    }
};
