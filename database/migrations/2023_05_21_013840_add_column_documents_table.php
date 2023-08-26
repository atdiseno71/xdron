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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_type_document')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('id_type_document')
                ->references('id')
                ->on('type_documents');

            $table->string('document_number', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id_type_document');
            $table->dropColumn('document_number');
        });
    }
};
