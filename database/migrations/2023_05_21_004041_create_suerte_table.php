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
        Schema::create('suerte', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('observaciones')->nullable();

            $table->unsignedBigInteger('id_zona')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_zona')
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
        Schema::dropIfExists('suerte');
    }
};
