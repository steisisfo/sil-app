<?php

namespace App\Filament\Resources\Partnerships\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PartnershipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('partner_name')
                    ->required(),
                TextInput::make('partnership_type')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('contact_info'),
                TextInput::make('logo'),
                TextInput::make('document_file'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
