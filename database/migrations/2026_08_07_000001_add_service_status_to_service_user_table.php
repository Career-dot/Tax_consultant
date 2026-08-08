<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_user', function (Blueprint $table) {
            if (!Schema::hasColumn('service_user', 'service_status')) {
                $table->string('service_status')->default('pending')->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('service_user', function (Blueprint $table) {
            if (Schema::hasColumn('service_user', 'service_status')) {
                $table->dropColumn('service_status');
            }
        });
    }
};
