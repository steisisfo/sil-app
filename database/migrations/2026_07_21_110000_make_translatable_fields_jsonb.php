<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Convert approved translatable fields from varchar/text to jsonb,
     * wrapping existing Indonesian values as {"id": "value"}.
     *
     * NULL values remain NULL. Unicode is preserved natively by PostgreSQL jsonb.
     * admissions.faq is deliberately excluded (deferred — structured JSON).
     */
    public function up(): void
    {
        $conversions = [
            'study_programs' => ['name', 'description', 'curriculum_details', 'learning_outcomes', 'accreditation', 'degree_title', 'career_prospects'],
            'research_groups' => ['name', 'description'],
            'pages' => ['title', 'content'],
            'admissions' => ['selection_path', 'admission_requirements'],
            'lecturers' => ['functional_position', 'research_fields', 'lab_managed'],
            'researches' => ['title', 'abstract'],
            'partnerships' => ['description'],
            'news' => ['title', 'content'],
            'events' => ['name', 'location', 'description'],
            'announcements' => ['title', 'content'],
            'services' => ['name', 'description', 'procedure'],
        ];

        foreach ($conversions as $table => $columns) {
            foreach ($columns as $column) {
                DB::statement("
                    ALTER TABLE {$table}
                    ALTER COLUMN {$column} TYPE jsonb
                    USING CASE
                        WHEN {$column} IS NULL THEN NULL
                        ELSE jsonb_build_object('id', {$column})
                    END
                ");
            }
        }
    }

    /**
     * Revert jsonb columns back to text, extracting the 'id' locale value.
     *
     * WARNING: This rollback is LOSSY. Any 'en' (or other locale) translations
     * that were added after this migration ran will be SILENTLY DISCARDED.
     * Only the 'id' locale value is preserved. This is an intentional trade-off
     * to provide a working rollback rather than none at all.
     */
    public function down(): void
    {
        // Original column types: varchar(255) or text. We track which were varchar
        // so we can restore the correct type after extracting the id locale.
        $varcharColumns = [
            'study_programs' => ['name', 'accreditation', 'degree_title'],
            'research_groups' => ['name'],
            'pages' => ['title'],
            'admissions' => ['selection_path'],
            'lecturers' => ['functional_position', 'research_fields', 'lab_managed'],
            'researches' => ['title'],
            'news' => ['title'],
            'events' => ['name', 'location'],
            'announcements' => ['title'],
            'services' => ['name'],
        ];

        $textColumns = [
            'study_programs' => ['description', 'curriculum_details', 'learning_outcomes', 'career_prospects'],
            'research_groups' => ['description'],
            'pages' => ['content'],
            'admissions' => ['admission_requirements'],
            'researches' => ['abstract'],
            'partnerships' => ['description'],
            'news' => ['content'],
            'events' => ['description'],
            'announcements' => ['content'],
            'services' => ['description', 'procedure'],
        ];

        // Revert varchar(255) columns
        foreach ($varcharColumns as $table => $columns) {
            foreach ($columns as $column) {
                DB::statement("
                    ALTER TABLE {$table}
                    ALTER COLUMN {$column} TYPE varchar(255)
                    USING CASE
                        WHEN {$column} IS NULL THEN NULL
                        ELSE ({$column} ->> 'id')
                    END
                ");
            }
        }

        // Revert text columns
        foreach ($textColumns as $table => $columns) {
            foreach ($columns as $column) {
                DB::statement("
                    ALTER TABLE {$table}
                    ALTER COLUMN {$column} TYPE text
                    USING CASE
                        WHEN {$column} IS NULL THEN NULL
                        ELSE ({$column} ->> 'id')
                    END
                ");
            }
        }
    }
};
