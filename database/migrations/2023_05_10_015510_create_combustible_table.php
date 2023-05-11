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
        Schema::create('combustible', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_tipo_combustible')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_tipo_combustible')
                ->references('id')
                ->on('tipo_combustible');

            $table->unsignedBigInteger('id_tipo_documento')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_tipo_documento')
                ->references('id')
                ->on('tipo_documento');

            $table->unsignedBigInteger('id_tipo_movimiento')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_tipo_movimiento')
                ->references('id')
                ->on('tipo_movimiento');

            $table->timestamp('fecha');
            $table->string('orden');
            $table->integer('cantidad');
            $table->string('motivo');
            $table->integer('numero_documento');
            $table->double('saldo')->nullable();

            $table->unsignedBigInteger('id_user')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('id_ciudad')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_ciudad')
                ->references('id')
                ->on('ciudad');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combustible');
    }
};
