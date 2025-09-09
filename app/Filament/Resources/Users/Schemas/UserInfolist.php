<?php

namespace App\Filament\Resources\User\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Information')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Name'),
                        TextEntry::make('email')
                            ->label('Email address')
                            ->icon(Heroicon::Envelope),
                        TextEntry::make('roles.name')
                            ->label('Roles'),
                    ]),

                Section::make('Details')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('email_verified_at')
                            ->label('Email verified at')
                            ->dateTime(),

                        TextEntry::make('created_at')
                            ->label('Created at')
                            ->dateTime(),
                    ]),

                RepeatableEntry::make('subscriptions')
                    ->schema([
                        TextEntry::make('starts_at')
                            ->label('Starts at')
                            ->dateTime(),
                        TextEntry::make('ends_at')
                            ->label('Ends at')
                            ->dateTime(),
                        TextEntry::make('status'),
                    ])
                    ->columns(3)
            ])->columns(1);
    }
}
