<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\PermissionType;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->revealable()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn ($state): bool => filled($state))
                    ->minLength(8),
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->maxItems(1)
                    ->preload()
                    ->searchable()
                    ->label(__('Role'))
                    ->visible(fn () => auth()->user()->can(PermissionType::MANAGE_ROLES->value)),
            ]);
    }
}
