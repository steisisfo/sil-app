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
        Schema::create('site_maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('heritage_site_id')->constrained('heritage_sites')->cascadeOnDelete();
            $table->foreignId('caretaker_id')->constrained('caretakers')->cascadeOnDelete();
            $table->date('maintenance_date');
            $table->string('activity_type');
            $table->text('description');
            $table->enum('site_condition', ['good', 'minor_damage', 'major_damage'])->default('good');
            $table->text('follow_up')->nullable();
            $table->boolean('is_urgent')->default(false);
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
        Schema::dropIfExists('site_maintenances');
    }
};
