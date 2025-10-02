<?php

namespace App\Filament\Resources\Subscriptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table; 
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class SubscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('user.name')
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
               
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(), 
            ])
            ->filters([
                
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'cancelled' => 'Cancelled',
                    ])
                    ->label('Status')
                    ->placeholder('All Statuses')
                    ->searchable()
                    ->multiple(),
                SelectFilter::make('plan_id')
                    ->relationship('plan', 'name')
                    ->label('Plan')
                    ->placeholder('All Plans')
                    ->searchable()
                    ->multiple(),
                SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->placeholder('All Users')
                    ->searchable()
                    ->multiple(),


                DateRangeFilter::make('starts_at'),
                DateRangeFilter::make('ends_at'),
                DateRangeFilter::make('trial_ends_at'),
 

            ], layout: FiltersLayout::AboveContent)->filtersFormColumns(3)
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
