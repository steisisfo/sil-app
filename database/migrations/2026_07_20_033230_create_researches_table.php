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
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('abstract')->nullable();
            $table->integer('year');
            $table->enum('type', ['journal', 'conference', 'book', 'patent', 'research_project']);
            $table->string('document_link')->nullable();
            $table->string('funding_source')->nullable();
            $table->enum('status', ['ongoing', 'completed'])->default('completed');
            $table->foreignId('research_group_id')->nullable()->constrained('research_groups')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};
