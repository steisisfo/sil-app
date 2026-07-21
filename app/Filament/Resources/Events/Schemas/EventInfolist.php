<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Models\Event;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('type'),
                TextEntry::make('start_datetime')
                    ->dateTime(),
                TextEntry::make('end_datetime')
                    ->dateTime(),
                TextEntry::make('location'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('registration_link')
                    ->placeholder('-'),
                TextEntry::make('speakers')
                    ->placeholder('-'),
                TextEntry::make('organizer')
                    ->placeholder('-'),
                TextEntry::make('poster')
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
                    ->visible(fn (Event $record): bool => $record->trashed()),
            ]);
    }
}
