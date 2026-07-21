<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(fn ($livewire) => ! method_exists($livewire, 'getActiveLocale') || $livewire->getActiveLocale() === 'id'),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('content')
                    ->required(fn ($livewire) => ! method_exists($livewire, 'getActiveLocale') || $livewire->getActiveLocale() === 'id')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                TextInput::make('author_id')
                    ->numeric(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
