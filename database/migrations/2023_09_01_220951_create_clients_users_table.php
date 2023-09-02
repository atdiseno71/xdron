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
        Schema::create('clients_users', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('client_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');

            $table->unsignedBigInteger('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('user_id')
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
        Schema::dropIfExists('clients_users');
    }
};
