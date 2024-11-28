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
        Schema::table('guarantees', function (Blueprint $table) {
            $table->enum('status', ['active', 'pending', 'issued', 'expired'])->default('pending')->after('applicant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guarantees', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
