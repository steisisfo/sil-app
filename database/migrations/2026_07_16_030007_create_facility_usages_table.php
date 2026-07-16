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
        Schema::create('facility_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete();
            $table->string('applicant_name');
            $table->string('institution')->nullable();
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('duration')->nullable();
            $table->enum('activity_type', ['traditional_ceremony', 'cultural_performance', 'education', 'exhibition', 'social_religious', 'other']);
            $table->boolean('is_commercial')->default(false);
            $table->text('activity_description')->nullable();
            $table->unsignedInteger('participant_count')->nullable();
            $table->string('application_letter')->nullable();
            $table->string('activity_proposal')->nullable();
            $table->enum('status', ['submitted', 'verified', 'pending_approval', 'approved', 'rejected', 'completed'])->default('submitted');
            $table->text('verification_notes')->nullable();
            $table->text('approval_notes')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->text('post_usage_condition')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_usages');
    }
};
