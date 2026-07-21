<?php

namespace App\Filament\Resources\StudyPrograms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudyProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('degree_level')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('curriculum_details')
                    ->columnSpanFull(),
                Textarea::make('learning_outcomes')
                    ->columnSpanFull(),
                TextInput::make('accreditation')
                    ->required(),
                TextInput::make('degree_title'),
                TextInput::make('study_duration'),
                Textarea::make('career_prospects')
                    ->columnSpanFull(),
                TextInput::make('contact_info')
                    ->required(),
            ]);
    }
}
