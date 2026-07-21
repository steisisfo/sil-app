<?php

namespace App\Filament\Resources\Admissions\Schemas;

use App\Models\Admission;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AdmissionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('selection_path'),
                TextEntry::make('degree_level'),
                TextEntry::make('admission_requirements')
                    ->columnSpanFull(),
                TextEntry::make('start_date')
                    ->date(),
                TextEntry::make('end_date')
                    ->date(),
                TextEntry::make('tuition_fee')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('capacity')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('external_link'),
                TextEntry::make('contact_info')
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
                    ->visible(fn (Admission $record): bool => $record->trashed()),
            ]);
    }
}
