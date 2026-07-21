<?php

namespace App\Filament\Resources\Lecturers\Schemas;

use App\Models\Lecturer;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LecturerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('nip')
                    ->placeholder('-'),
                TextEntry::make('nidn')
                    ->placeholder('-'),
                TextEntry::make('functional_position'),
                TextEntry::make('study_program_id')
                    ->numeric(),
                TextEntry::make('research_group_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('research_fields')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label(__('Email Address')),
                TextEntry::make('photo')
                    ->placeholder('-'),
                TextEntry::make('scopus_link'),
                TextEntry::make('google_scholar_link'),
                TextEntry::make('sinta_link'),
                TextEntry::make('lab_managed')
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Lecturer $record): bool => $record->trashed()),
            ]);
    }
}
