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
        Schema::create('repuesto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');

            $table->unsignedBigInteger('id_proveedor')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_proveedor')
                ->references('id')
                ->on('proveedor');

            $table->unsignedBigInteger('id_pn')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_pn')
                ->references('id')
                ->on('repuesto_pn');

            $table->unsignedBigInteger('id_marca')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_marca')
                ->references('id')
                ->on('marca');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuesto');
    }
};
