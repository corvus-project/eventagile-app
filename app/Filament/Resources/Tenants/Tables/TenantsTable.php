<?php

namespace App\Filament\Resources\Tenants\Tables;

use App\Filament\Resources\Tenants\Pages\ListUsers;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;

class TenantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),

                IconColumn::make('is_active')
                    ->icon(fn(string $state): Heroicon => match ($state) {
                        '' => Heroicon::OutlinedXCircle,
                        '0' => Heroicon::OutlinedExclamationCircle,
                        '1' => Heroicon::OutlinedCheckCircle,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '' => 'danger',
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->label('Active')->sortable(),


                TextColumn::make('domains')
                    ->label('Domain')
                    ->getStateUsing(fn($record) => $record->domains->pluck('domain')->implode(', '))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
            ])
            ->filters([])
            ->recordActions([
                Action::make('users')
                    ->label('Users')
                    ->icon(Heroicon::Users)
                    ->url(fn($record): string => ListUsers::getUrl([$record->id])),
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
