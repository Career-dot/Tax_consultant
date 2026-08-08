<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            if (!Schema::hasColumn('documents', 'required_document_id')) {
                $table->foreignId('required_document_id')->nullable()->after('service_id')->constrained()->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            if (Schema::hasColumn('documents', 'required_document_id')) {
                $table->dropForeign(['required_document_id']);
                $table->dropColumn('required_document_id');
            }
        });
    }
};
