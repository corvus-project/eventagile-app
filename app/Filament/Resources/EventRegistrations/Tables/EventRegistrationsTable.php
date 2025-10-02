<?php

namespace App\Filament\Resources\EventRegistrations\Tables;

use App\Models\Event;
use App\Models\EventRegistration;
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

class EventRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        $query = EventRegistration::query();


        return $table
            ->query($query->with(['event', 'event.organizer']))
            ->columns([
                TextColumn::make('event.title')
                    ->label('Event')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('event.organizer.name')
                    ->label('Organizer')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                IconColumn::make('is_attending')
                    ->boolean(),
                TextColumn::make('registered_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('event_id')
                    ->label('Event')
                    ->options(Event::pluck('title', 'id'))
                    ->searchable()
                    ->placeholder('All events'),

                SelectFilter::make('status')
                    ->options([
                        'registered' => 'Registered',
                        'attended' => 'Attended',
                        'cancelled' => 'Cancelled',
                        'no_show' => 'No Show',
                    ])
                    ->label('Status')
                    ->placeholder('All statuses'),

                SelectFilter::make('is_attending')
                    ->options([
                        1 => 'Attending',
                        0 => 'Not attending',
                    ])
                    ->label('Attendance')
                    ->placeholder('All attendance'),

            ], layout: FiltersLayout::AboveContent)->filtersFormColumns(3)
            ->recordActions([
                                ViewAction::make(),
                EditAction::make(),

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
