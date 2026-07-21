<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('category')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('procedure')
                    ->columnSpanFull(),
                TextInput::make('related_link'),
                TextInput::make('pic_contact')
                    ->required(),
                FileUpload::make('document_file')
                    ->label('Dokumen PDF')
                    ->disk('public')
                    ->directory('documents')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(10240),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
