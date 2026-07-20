<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('study_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('degree_level', ['S1', 'S2', 'S3']);
            $table->text('description');
            $table->text('curriculum_details')->nullable();
            $table->text('learning_outcomes')->nullable();
            $table->string('accreditation');
            $table->string('degree_title')->nullable();
            $table->string('study_duration')->nullable();
            $table->text('career_prospects')->nullable();
            $table->string('contact_info');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
