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
        Schema::create('observation_operation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('operation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('operation_id')
                ->references('id')
                ->on('operation');

            $table->text('observation_admin')->nullable();
            $table->text('observation_pilot')->nullable();
            $table->text('observation_asistent_one')->nullable();
            $table->text('observation_asistent_two')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observation_operation');
    }
};
