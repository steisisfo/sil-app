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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // ROLLBACK NOTE: Reversing this migration will recreate the 'role' column,
        // but it will NOT restore the data that was in it. The Spatie roles will
        // still exist, so you may need to write a script to re-populate 'role'
        // from the Spatie roles if you are doing a full system rollback.
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('content_creator')->after('password');
        });
    }
};
