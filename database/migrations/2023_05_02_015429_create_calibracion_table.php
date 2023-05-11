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
        Schema::create('calibracion', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cliente')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_cliente')
                ->references('id')
                ->on('cliente');

            $table->date('fecha');
            $table->string('archivo1')->nullable();
            $table->string('observacion_piloto')->nullable();
            $table->string('observacion_cliente')->nullable();
            $table->string('archivo2');
            $table->string('archivo3');
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
        Schema::dropIfExists('calibracion');
    }
};
