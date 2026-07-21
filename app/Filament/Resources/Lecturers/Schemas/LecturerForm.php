<?php

namespace App\Filament\Resources\Lecturers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LecturerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('nip'),
                TextInput::make('nidn'),
                TextInput::make('functional_position')
                    ->required(),
                Select::make('study_program_id')
                    ->label(__('Study Program'))
                    ->relationship('studyProgram', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('research_group_id')
                    ->label(__('Research Group'))
                    ->relationship('researchGroup', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('research_fields'),
                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email()
                    ->required(),
                TextInput::make('photo'),
                TextInput::make('scopus_link')
                    ->required(),
                TextInput::make('google_scholar_link')
                    ->required(),
                TextInput::make('sinta_link')
                    ->required(),
                TextInput::make('lab_managed'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
