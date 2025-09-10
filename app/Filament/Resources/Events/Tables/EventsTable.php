<?php

namespace App\Filament\Resources\Events\Tables;

use App\Enums\EventStatus;
use App\Filament\Resources\Events\Pages\ViewRegistrations;
use App\Models\Event;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\View;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('organizer.name')
                    ->searchable(),

                TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('registration_ends_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('capacity')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_public')
                    ->boolean(),
                TextColumn::make('status')
                     
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                    

            ])
            ->filters([
                SelectFilter::make('organizer_id')
                    ->relationship('organizer', 'name')
                    ->label('Organizer')
                    ->searchable()
                    ->placeholder('All organizers'),

                SelectFilter::make('status')
                    ->options(EventStatus::toCollection()->pluck('name', 'name')->toArray())
                    ->placeholder('All statuses'), 

                    SelectFilter::make('is_public')
                    ->options([
                        1 => 'Public',
                        0 => 'Private',
                    ])
                    ->placeholder('All visibility'),

            ], layout: FiltersLayout::AboveContent)->filtersFormColumns(3)
            ->recordActions([
                EditAction::make(),
                ViewAction::make()
              

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
