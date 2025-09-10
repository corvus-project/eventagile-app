<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('email')
                        ->label('Email address')
                        ->email()
                        ->required(),

                    Select::make('roles')->relationship(
                        'roles',
                        'name'
                    )
                        ->required()->label('Role'),
                ])->columns(1),

                Section::make()->schema([
                    TextInput::make('password')
                        ->password()
                        ->revealable(),

                    TextInput::make('password_confirmation')
                        ->password()
                        ->autocomplete('password')->same('password'),
                ])->columns(2),
            ])->columns(1);
    }
}
