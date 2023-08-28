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
        Schema::create('files_operation', function (Blueprint $table) {

            $table->id();

            $table->text('record')->nullable();
            $table->text('track')->nullable();
            $table->text('map')->nullable();

            $table->unsignedBigInteger('detail_operation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('detail_operation_id')
                ->references('id')
                ->on('detail_operation');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_operation');
    }
};
