<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                DateTimePicker::make('start_datetime')
                    ->required(),
                DateTimePicker::make('end_datetime')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('registration_link'),
                TextInput::make('speakers'),
                TextInput::make('organizer'),
                TextInput::make('poster'),
                TextInput::make('status')
                    ->required()
                    ->default('upcoming'),
            ]);
    }
}
