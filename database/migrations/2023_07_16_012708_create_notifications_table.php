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
        // Cambiar el motor de almacenamiento temporalmente a MyISAM
        Schema::table('notifications', function (Blueprint $table) {
            $table->engine = 'MyISAM';
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type', 100); // Reducir la longitud de la columna 'type' a VARCHAR(100)
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            // Agregar un índice prefix para notifiable_type y notifiable_id
            $table->index(['notifiable_type', 'notifiable_id'], 'notifications_notifiable_index', 'btree', 190)->collation('utf8mb4_bin');
        });

        // Cambiar de vuelta a InnoDB
        Schema::table('notifications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
