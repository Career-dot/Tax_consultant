<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->index('role');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->index('status');
        });

        Schema::table('deadline_rules', function (Blueprint $table) {
            $table->index(['taxpayer_type', 'is_active']);
        });

        Schema::table('planner_subscriptions', function (Blueprint $table) {
            $table->index('session_token');
            $table->index('email');
        });

        Schema::table('planner_deadlines', function (Blueprint $table) {
            $table->index('due_date');
            $table->index(['planner_subscription_id', 'due_date']);
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->index(['user_id', 'status']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->index(['user_id', 'status']);
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->index(['user_id', 'is_read']);
        });

        Schema::table('notifications_log', function (Blueprint $table) {
            $table->index(['type', 'status']);
            $table->index('recipient');
        });

        Schema::table('tax_updates', function (Blueprint $table) {
            $table->index(['is_published', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });

        Schema::table('deadline_rules', function (Blueprint $table) {
            $table->dropIndex(['taxpayer_type', 'is_active']);
        });

        Schema::table('planner_subscriptions', function (Blueprint $table) {
            $table->dropIndex(['session_token']);
            $table->dropIndex(['email']);
        });

        Schema::table('planner_deadlines', function (Blueprint $table) {
            $table->dropIndex(['due_date']);
            $table->dropIndex(['planner_subscription_id', 'due_date']);
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'status']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'status']);
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'is_read']);
        });

        Schema::table('notifications_log', function (Blueprint $table) {
            $table->dropIndex(['type', 'status']);
            $table->dropIndex(['recipient']);
        });

        Schema::table('tax_updates', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'published_at']);
        });
    }
};
