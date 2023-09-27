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

            $table->unsignedBigInteger('operation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('operation_id')
                ->references('id')
                ->on('operation');

            $table->unsignedBigInteger('dron_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('dron_id')
                ->references('id')
                ->on('dron');

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

            $table->unsignedBigInteger('type_product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('type_product_id')
                ->references('id')
                ->on('type_products');

            $table->text('evidencia_record')->nullable();
            $table->text('evidencia_track')->nullable();
            $table->text('evidencia_gps')->nullable();

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
