<?php

namespace App\Filament\Resources\Plans\Schemas;

use App\Enums\PlanInterval;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PlanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Info')->schema([
                    TextEntry::make('name'),
                    TextEntry::make('slug'),
                    TextEntry::make('description'),
                ])->columns(2),

                Section::make('Pricing')->schema([
                    TextEntry::make('price')
                        ->money(fn ($record) => $record->currency),
                    TextEntry::make('currency'),
                    TextEntry::make('is_active')
                        ->badge()
                        ->color(fn ($state) => $state ? 'success' : 'danger'),
                ])->columns(3),

                Section::make('Billing Cycle')->schema([
                    TextEntry::make('interval'),
                    TextEntry::make('interval_count'),
                ])->columns(2),

                Section::make('Stripe')->schema([
                    TextEntry::make('stripe_price_id'),
                ])->columns(1),

                Section::make('Features')->schema([
                    TextEntry::make('features')
                        ->formatStateUsing(fn ($state) => $state ? json_encode($state) : null),
                ])->columns(1),

                Section::make('Limitations')->schema([
                    TextEntry::make('limitations')
                        ->formatStateUsing(fn ($state) => $state ? json_encode($state) : null),
                ])->columns(1),
            ])->columns(1);
    }
}
