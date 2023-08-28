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
        Schema::create('lucks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('observations')->nullable();

            $table->unsignedBigInteger('estate_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('estate_id')
                ->references('id')
                ->on('estate');

            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

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
