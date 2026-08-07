<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('planner_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('taxpayer_type');
            $table->boolean('has_sales_tax')->default(false);
            $table->boolean('has_withholding_agent')->default(false);
            $table->string('sector')->nullable();
            $table->boolean('email_reminders')->default(true);
            $table->boolean('sms_reminders')->default(false);
            $table->string('session_token')->nullable(); // for anonymous planner users
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planner_subscriptions');
    }
};
