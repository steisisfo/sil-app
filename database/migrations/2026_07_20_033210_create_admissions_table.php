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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('selection_path');
            $table->enum('degree_level', ['S1', 'S2', 'S3']);
            $table->text('admission_requirements');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('tuition_fee', 15, 2)->nullable();
            $table->integer('capacity')->nullable();
            $table->string('external_link');
            $table->json('faq')->nullable();
            $table->string('contact_info')->nullable();
            $table->enum('status', ['active', 'archived'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
      * Reverse the migrations.
      */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
