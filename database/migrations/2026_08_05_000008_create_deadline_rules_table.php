<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deadline_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('taxpayer_type'); // salaried_individual, business_individual, aop, company
            $table->boolean('requires_sales_tax')->default(false);
            $table->boolean('requires_withholding_agent')->default(false);
            $table->string('sector')->nullable();
            $table->string('deadline_type'); // monthly_sales_tax, withholding_statement, advance_tax, annual_return, wealth_statement
            $table->string('frequency'); // monthly, quarterly, annually
            $table->string('day_of_month')->nullable(); // e.g., "18" for 18th of month
            $table->string('month_of_quarter')->nullable(); // e.g., "last" for last month of quarter
            $table->text('custom_date_rule')->nullable(); // JSON for complex date rules
            $table->text('statutory_basis')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deadline_rules');
    }
};
