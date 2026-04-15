<?php

namespace App\Filament\Resources\Tenants\Schemas;

use App\Filament\Resources\Users\UserResource;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TenantInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextEntry::make('id')->label('ID'),
                    TextEntry::make('name')->label('Name'),
                    TextEntry::make('email')
                        ->label('Email address'),

                    TextEntry::make('tenancy_db_name')
                        ->label('Tenant Database Name'),
                ])->columns(2),


                Section::make()->schema([
                    TextEntry::make('user.id')->label('ID'),
                    TextEntry::make('user.name')
                        ->label('Name')
                        ->url(fn($record) => UserResource::getUrl('view', ['record' => $record->user_id])),
                    TextEntry::make('user.email')
                        ->label('Email address'),

                ])->columns(2),


                RepeatableEntry::make('domains')
                    ->label('Domains')
                    ->schema([
                        TextEntry::make('domain')->label('Domain'),
                    ])
                    ->columns(1),

                RepeatableEntry::make('subscriptions')
                    ->label('Subscriptions')
                    ->schema([
                        TextEntry::make('domain')->label('Domain'),
                    ])
                    ->columns(1)

            ])->columns(1);
    }
}
