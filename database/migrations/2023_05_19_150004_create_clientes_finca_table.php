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
        Schema::create('clientes_finca', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cliente')->nullable()->constrained()->onDelete('cascade');
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

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes_finca_zonas');
    }
};
