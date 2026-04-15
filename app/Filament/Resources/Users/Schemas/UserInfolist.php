<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Resources\Tenants\TenantResource;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextEntry::make('name')->label('Name'),
                    TextEntry::make('email')
                        ->label('Email address'),

                    TextEntry::make('roles.name')
                        ->label('Role'),
                ])->columns(1),


                RepeatableEntry::make('tenants')
                    ->label('Tenants')
                    ->schema([
                        TextEntry::make('name')
                            ->url(fn($record) => TenantResource::getUrl('view', ['record' => $record->id]))
                            ->label('Tenant Name'),
                        TextEntry::make('name')->label('Name'),
                        TextEntry::make('email')
                            ->label('Email address'),
                    ])
                    ->columns(3)

            ])->columns(1);
    }
}
