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
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('heritage_site_id')->constrained('heritage_sites')->cascadeOnDelete();
            $table->string('applicant_name');
            $table->string('institution')->nullable();
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->date('visit_date');
            $table->unsignedInteger('visitor_count');
            $table->enum('visit_purpose', ['tourism', 'education', 'research', 'other'])->default('tourism');
            $table->text('purpose_description')->nullable();
            $table->string('application_letter')->nullable();
            $table->string('recommendation_letter')->nullable();
            $table->enum('status', ['submitted', 'verified', 'approved', 'rejected', 'completed'])->default('submitted');
            $table->text('verification_notes')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->unsignedInteger('actual_visitor_count')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_requests');
    }
};
