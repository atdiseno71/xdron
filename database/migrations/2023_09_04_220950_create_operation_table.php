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
        Schema::create('operation', function (Blueprint $table) {

            $table->id();

            $table->string('download')->nullable();

            $table->text('observation_admin')->nullable();
            $table->text('file_evidence')->nullable();

            $table->unsignedBigInteger('assistant_id_one')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('assistant_id_one')
                ->references('id')
                ->on('assistants');

            $table->unsignedBigInteger('assistant_id_two')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('assistant_id_two')
                ->references('id')
                ->on('assistants');

            $table->unsignedBigInteger('pilot_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('pilot_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('id_cliente')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_cliente')
                ->references('id')
                ->on('clients');

            $table->unsignedBigInteger('admin_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('admin_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation');
    }
};
