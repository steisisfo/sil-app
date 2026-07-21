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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->nullable()->unique();
            $table->string('nidn')->nullable()->unique();
            $table->string('functional_position');
            $table->foreignId('study_program_id')->constrained('study_programs')->cascadeOnDelete();
            $table->foreignId('research_group_id')->nullable()->constrained('research_groups')->nullOnDelete();
            $table->string('research_fields')->nullable();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('scopus_link');
            $table->string('google_scholar_link');
            $table->string('sinta_link');
            $table->string('lab_managed')->nullable();
            $table->enum('status', ['active', 'retired', 'mutated'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
