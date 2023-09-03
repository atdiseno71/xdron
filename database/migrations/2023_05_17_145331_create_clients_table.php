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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('nit', 30);
            $table->string('social_reason', 120);
            $table->string('address', 60);
            $table->string('phone', 30);
            $table->string('email_enterprise', 191)->nullable();
            $table->string('email_enterprise2', 191)->nullable();
            $table->string('email_user', 191)->nullable();
            $table->string('full_name_user', 120);

            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->text('observations')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
