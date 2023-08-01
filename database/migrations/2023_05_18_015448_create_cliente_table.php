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

            $table->unsignedBigInteger('id_user')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');

            $table->string('contacto');
            $table->string('direccion');
            $table->char('campos_nuevos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email_encargado')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();

            $table->text('observaciones')->nullable();

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
