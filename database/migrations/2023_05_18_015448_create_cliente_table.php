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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nit');
            $table->string('nombre');
            $table->string('contacto')->nullable();
            $table->string('email');
            $table->char('campos_nuevos')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email_encargado');
            $table->string('email1');
            $table->string('email2');
            $table->string('email3');

            $table->unsignedBigInteger('id_finca')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_finca')
                ->references('id')
                ->on('finca');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
