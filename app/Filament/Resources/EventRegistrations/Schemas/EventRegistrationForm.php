<?php

namespace App\Filament\Resources\EventRegistrations\Schemas;

use App\Enums\RegistrationStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('event.title')->disabledOn('edit')->label('Event'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                Toggle::make('is_attending')
                    ->required(),
                DateTimePicker::make('registered_at')
                    ->required(),
                Select::make('status')
                    ->options(RegistrationStatus::class)
                    ->default('Pending')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
