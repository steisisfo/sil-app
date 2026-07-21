<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('Title'))
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
                    ->label(__('Main Image'))
                    ->image()
                    ->disk('public')
                    ->directory('news')
                    ->imageEditor()
                    ->maxSize(5120)
                    ->required(fn (string $operation): bool => $operation === 'create'),
                Select::make('category')
                    ->label(__('Category'))
                    ->options([
                        'academic' => __('Academic'),
                        'research' => __('Research'),
                        'student_affairs' => __('Student Affairs'),
                        'general' => __('General'),
                    ])
                    ->required(),
                TextInput::make('tags'),
                Select::make('author_id')
                    ->label(__('Author'))
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options([
                        'draft' => __('Draft'),
                        'published' => __('Published'),
                        'archived' => __('Archived'),
                    ])
                    ->required(),
                DateTimePicker::make('published_at'),
                TextInput::make('views_count')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
