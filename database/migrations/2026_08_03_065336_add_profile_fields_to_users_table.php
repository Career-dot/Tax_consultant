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
            $table->string('phone')->nullable()->after('name');
            $table->string('cnic')->nullable()->after('phone');
            $table->string('city')->nullable()->after('cnic');
            $table->string('address')->nullable()->after('city');
            $table->string('avatar_path')->nullable()->after('address');
            $table->json('notification_preferences')->nullable()->after('avatar_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'cnic', 'city', 'address', 'avatar_path', 'notification_preferences']);
        });
    }
};
