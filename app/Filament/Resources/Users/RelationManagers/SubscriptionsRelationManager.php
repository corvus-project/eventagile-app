<?php

namespace App\Filament\Resources\Shop\Orders\RelationManagers;

use Akaunting\Money\Currency;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SubscriptionsRelationManager extends RelationManager
{
    protected static string $relationship = 'subscriptions';

    protected static ?string $recordTitleAttribute = 'reference';


    public function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('plan.name')
                    ->sortable(),
                TextColumn::make('starts_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('ends_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('trial_ends_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),

                TextColumn::make('plan.name')
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),




            ])
            ->filters([
                //
            ])
            ->headerActions([
                //CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make('Edit')
                    ->url(fn($record) => route('filament.admin.resources.subscriptions.edit', $record))
                    ->openUrlInNewTab(),
                ViewAction::make('View')
                    ->url(fn($record) => route('filament.admin.resources.subscriptions.view', $record))
                    ->openUrlInNewTab(),
            ])
            ->groupedBulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
