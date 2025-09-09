<?php

namespace App\Filament\Resources\EventRegistrations\Tables;

use App\Models\Event;
use App\Models\EventRegistration;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EventRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        $query = EventRegistration::query();
        $rows = $query->with(['event', 'event.organizer'])->toSql();
 
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
                SelectFilter::make('event.organizer_id')
                    ->relationship('organizer', 'name')
                    ->label('Organizer')
                    ->searchable()
                    ->placeholder('All organizers'),
            ])
            ->recordActions([
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
