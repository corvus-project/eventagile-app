<?php

namespace App\Filament\Resources\Tenants\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    Select::make('user_id')
                        ->label('User')
                        ->relationship('user', 'name')
                        ->required()->columnSpanFull(),
                    TextInput::make('name')
                        ->label('Tenant Name')
                        ->required()->columnSpanFull(),
                    TextInput::make('email')
                        ->label('Email address')
                        ->email()
                        ->required()->columnSpanFull(),

                    TextInput::make('domain')
                        ->label('Domain')
                        ->required()->columnSpanFull(),
                    Toggle::make('is_active')
                        ->label('Is Active')
                        ->default(true),
                ])->columns(1),
            ])->columns(1);
    }
}
