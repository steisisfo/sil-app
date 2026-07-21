<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('target_audience')
                    ->required(),
                DateTimePicker::make('valid_from'),
                DateTimePicker::make('valid_until'),
                TextInput::make('attachment_file'),
                TextInput::make('priority')
                    ->required()
                    ->default('normal'),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                Toggle::make('is_pinned')
                    ->required(),
                TextInput::make('author_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
