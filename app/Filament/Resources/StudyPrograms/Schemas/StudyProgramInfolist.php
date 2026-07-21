<?php

namespace App\Filament\Resources\StudyPrograms\Schemas;

use App\Models\StudyProgram;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudyProgramInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('degree_level'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('curriculum_details')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('learning_outcomes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('accreditation'),
                TextEntry::make('degree_title')
                    ->placeholder('-'),
                TextEntry::make('study_duration')
                    ->placeholder('-'),
                TextEntry::make('career_prospects')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('contact_info'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (StudyProgram $record): bool => $record->trashed()),
            ]);
    }
}
