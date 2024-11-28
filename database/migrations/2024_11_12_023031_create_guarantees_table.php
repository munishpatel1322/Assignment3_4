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
        Schema::create('guarantees', function (Blueprint $table) {
            $table->id();
            $table->string('corporate_reference_number')->unique();
            $table->enum('guarantee_type', ['Bank', 'Bid Bond', 'Insurance', 'Surety']);
            $table->decimal('nominal_amount', 15, 2);
            $table->string('currency');
            $table->date('expiry_date');
            $table->unsignedBigInteger('applicant_id')->nullable(); // Add applicant_id column
            $table->foreign('applicant_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key
            $table->enum('status', ['active', 'pending', 'issued', 'expired']);
            $table->string('beneficiary_name');
            $table->text('beneficiary_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarantees');
    }
};
