<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('planner_deadlines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planner_subscription_id')->constrained()->cascadeOnDelete();
            $table->foreignId('deadline_rule_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->date('due_date');
            $table->text('description')->nullable();
            $table->boolean('reminder_7day_sent')->default(false);
            $table->boolean('reminder_2day_sent')->default(false);
            $table->boolean('reminder_today_sent')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planner_deadlines');
    }
};
