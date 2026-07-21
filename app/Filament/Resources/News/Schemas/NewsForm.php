<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
    ->label('Judul')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->unique(ignoreRecord: true)
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('news')
                    ->imageEditor()
                    ->maxSize(5120),
                TextInput::make('category')
                    ->required(),
                TextInput::make('tags'),
                TextInput::make('author_id')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draf',
                        'published' => 'Terbit',
                        'archived' => 'Arsip',
                    ])
                    ->required(),
                DateTimePicker::make('published_at'),
                TextInput::make('views_count')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
