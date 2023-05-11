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
        Schema::create('historial_archivos_creados', function (Blueprint $table) {
            $table->id();
            $table->string('directorio');
            $table->string('nombre_archivo')->unique();

            $table->unsignedBigInteger('id_user')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');

            $table->date('fecha_registro');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_archivos_creados');
    }
};
