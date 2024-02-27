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
        Schema::table('detail_operation', function (Blueprint $table) {
            $table->dropForeign(['type_product_id']);
            $table->dropColumn('type_product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operation', function (Blueprint $table) {
            $table->unsignedBigInteger('type_product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('type_product_id')
                ->references('id')
                ->on('type_products');
        });
    }
};
