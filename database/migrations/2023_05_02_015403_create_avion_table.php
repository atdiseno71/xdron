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
        Schema::create('avion', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('ano');
            $table->string('serie');
            $table->string('motor');
            $table->string('horometro');
            $table->string('alas');
            $table->string('fuselage');
            $table->string('helice');
            $table->string('cola');
            $table->string('hora_motor');
            $table->string('centro_costo');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avion');
    }
};
