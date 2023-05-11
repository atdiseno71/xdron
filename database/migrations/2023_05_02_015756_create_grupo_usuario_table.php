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
        Schema::create('grupo_usuario', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('id_grupo')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_grupo')
                ->references('id')
                ->on('grupo');

            $table->string('cliente')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_usuario');
    }
};
