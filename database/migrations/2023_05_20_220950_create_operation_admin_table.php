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
        Schema::create('operation_admin', function (Blueprint $table) {

            $table->id();

            $table->string('descarga')->nullable();
            $table->date('date_ejecution');
            $table->text('observaciones')->nullable();

            $table->unsignedBigInteger('type_product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('type_product_id')
                ->references('id')
                ->on('products');

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
                ->on('clientes');

            $table->unsignedBigInteger('status_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');

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
        Schema::dropIfExists('operation_admin');
    }
};
