<?php

namespace App\Filament\Widgets;

use App\Models\Subscription;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestSubscriptionsOverview extends TableWidget
{
    protected static ?int $navigationSort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Subscription::query())
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('plan_name')->label('Plan'),
                TextColumn::make('user.name')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
