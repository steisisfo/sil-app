<?php

namespace App\Filament\Resources\Research\Schemas;

use App\Models\Research;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ResearchInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('abstract')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('year')
                    ->numeric(),
                TextEntry::make('type'),
                TextEntry::make('document_link')
                    ->placeholder('-'),
                TextEntry::make('funding_source')
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('research_group_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Research $record): bool => $record->trashed()),
            ]);
    }
}
