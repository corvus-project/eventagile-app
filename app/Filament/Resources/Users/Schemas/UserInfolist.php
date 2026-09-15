<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Resources\Tenants\TenantResource;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\RepeatableEntry\TableColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use Filament\Actions\Action;

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
                    ->table(
                        [
                            TableColumn::make('id'),
                            TableColumn::make('Name'),
                            TableColumn::make('Email'),
                            TableColumn::make('Domain'),
                            TableColumn::make('Status'),
                            TableColumn::make('Created At'),
                        ]
                    )
                    ->schema([
                        TextEntry::make('id'),
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                        TextEntry::make('primary_domain'),
                        TextEntry::make('is_active')
                            ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive'),
                        TextEntry::make('created_at')
                            ->suffixAction(
                                Action::make('View Subscription')
                                    ->icon('heroicon-o-eye')
                                    ->url(fn($record) => route('filament.cp.resources.tenants.view', ['record' => $record->id]))

                            ),
                    ])
                    ->columns(4)


            ])->columns(1);
    }
}
