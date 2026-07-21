<?php

namespace App\Filament\Resources\Admissions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AdmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('selection_path')
                    ->required(),
                TextInput::make('degree_level')
                    ->required(),
                Textarea::make('admission_requirements')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('tuition_fee')
                    ->numeric(),
                TextInput::make('capacity')
                    ->numeric(),
                TextInput::make('external_link')
                    ->required(),
                TextInput::make('faq'),
                TextInput::make('contact_info'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
