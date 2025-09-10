<?php

namespace App\Filament\Resources\Subscriptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Schemas\Components\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
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
                TextColumn::make('cancellation_reason')
                    ->searchable(),
                TextColumn::make('cancellation_requested_by')
                    ->searchable(),
                TextColumn::make('billing_address')
                    ->searchable(),
                TextColumn::make('payment_method')
                    ->searchable(),
                TextColumn::make('currency')
                    ->searchable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('interval')
                    ->searchable(),
                TextColumn::make('interval_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tax_rate')
                    ->searchable(),
                TextColumn::make('coupon')
                    ->searchable(),
                TextColumn::make('discount')
                    ->searchable(),
                TextColumn::make('next_billing_date')
                    ->searchable(),
                TextColumn::make('last_payment_date')
                    ->searchable(),
                TextColumn::make('last_payment_status')
                    ->searchable(),
                TextColumn::make('payment_gateway')
                    ->searchable(),
                TextColumn::make('external_id')
                    ->searchable(),
                TextColumn::make('plan_name')
                    ->searchable(),
                TextColumn::make('plan_description')
                    ->searchable(),
                TextColumn::make('plan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('plan_features')
                    ->searchable(),
                TextColumn::make('renewal_status')
                    ->searchable(),
                TextColumn::make('renewal_date')
                    ->searchable(),
                TextColumn::make('cancellation_date')
                    ->searchable(),
                TextColumn::make('reactivation_date')
                    ->searchable(),
                TextColumn::make('source')
                    ->searchable(),
                TextColumn::make('utm_parameters')
                    ->searchable(),
                TextColumn::make('referral_code')
                    ->searchable(),
                TextColumn::make('affiliate_id')
                    ->searchable(),
                TextColumn::make('metadata')
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
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
