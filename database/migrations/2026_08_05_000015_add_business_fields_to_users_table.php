<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'business_name')) {
                $table->string('business_name')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'business_type')) {
                $table->string('business_type')->nullable()->after('business_name'); // individual, trader, corporate
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('business_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = array_filter(
                ['business_name', 'business_type', 'address'],
                fn ($column) => Schema::hasColumn('users', $column)
            );

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
