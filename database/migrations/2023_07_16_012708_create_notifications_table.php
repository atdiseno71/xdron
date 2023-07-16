<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE TABLE IF NOT EXISTS `notifications` (
                `id` char(36) NOT NULL,
                `type` varchar(255) NOT NULL,
                `notifiable_type` varchar(255) NOT NULL,
                `notifiable_id` bigint(20) unsigned NOT NULL,
                `data` text NOT NULL,
                `read_at` timestamp NULL DEFAULT NULL,
                `created_at` timestamp NULL DEFAULT NULL,
                `updated_at` timestamp NULL DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
