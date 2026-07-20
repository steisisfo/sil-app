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
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('partner_name');
            $table->enum('partnership_type', ['research', 'education', 'industry', 'international']);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description');
            $table->string('contact_info')->nullable();
            $table->string('logo')->nullable();
            $table->string('document_file')->nullable();
            $table->enum('status', ['active', 'ended'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnerships');
    }
};
