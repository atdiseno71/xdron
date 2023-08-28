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
        Schema::create('detail_operation', function (Blueprint $table) {

            $table->id();

            $table->string('number_flights')->nullable();
            $table->string('hour_flights')->nullable();
            $table->string('acres')->nullable();
            $table->string('download')->nullable();

            $table->text('description')->nullable();
            $table->text('observation')->nullable();

            $table->unsignedBigInteger('estate_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('estate_id')
                ->references('id')
                ->on('estate');

            $table->unsignedBigInteger('luck_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('luck_id')
                ->references('id')
                ->on('lucks');

            $table->unsignedBigInteger('zone_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('zone_id')
                ->references('id')
                ->on('zones');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_operation');
    }
};
