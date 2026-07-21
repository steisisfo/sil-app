<?php

namespace App\Filament\Resources\Research\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ResearchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('abstract')
                    ->columnSpanFull(),
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('document_link'),
                TextInput::make('funding_source'),
                TextInput::make('status')
                    ->required()
                    ->default('completed'),
                TextInput::make('research_group_id')
                    ->numeric(),
            ]);
    }
}
