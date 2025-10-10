<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestEventsOverview extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $navigationSort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Event::query()->with('user'))
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('organizer_name'),
                TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('is_public')
                    ->boolean(),

                TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                ViewAction::make('Registrations')
                    ->label('Registrations')
                    ->url(fn(Event $record): string => route('filament.admin.resources.registrations.index', [
                        'filters' => [
                            'event_id' => [
                                'value' => $record->id,
                            ],
                        ],
                    ]))
                    ->icon('heroicon-o-users')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
