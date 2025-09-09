<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Enums\EventStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('title')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('slug'),
                TextInput::make('registration_code'),
                DateTimePicker::make('start_time')
                    ->required(),
                DateTimePicker::make('registration_ends_at'),
                Textarea::make('location')
                    ->columnSpanFull(),
                Textarea::make('organizer')
                    ->columnSpanFull(),
                TextInput::make('capacity')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_public')
                    ->required(),
                TextInput::make('organizer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('plan_id')
                    ->numeric(),
                Select::make('status')
                    ->options(EventStatus::class)
                    ->default('Pending')
                    ->required(),
            ]);
    }
}
