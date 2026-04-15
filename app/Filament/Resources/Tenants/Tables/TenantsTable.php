<?php

namespace App\Filament\Resources\Tenants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class TenantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user_id')->label('User ID')->sortable(),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('is_active'),
                IconColumn::make('is_active')
                    ->icon(fn(string $state): Heroicon => match ($state) {
                        '' => Heroicon::OutlinedXCircle,
                        '0' => Heroicon::OutlinedPencil,
                        '1' => Heroicon::OutlinedCheckCircle,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '' => 'danger',
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->label('Active')->sortable()

            ])
            ->filters([
                //
            ])
            ->recordActions([
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
