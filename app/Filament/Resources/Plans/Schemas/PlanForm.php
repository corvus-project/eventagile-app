<?php

namespace App\Filament\Resources\Plans\Schemas;

use App\Enums\PlanInterval;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Info')->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    TextInput::make('description')
                        ->maxLength(255),
                ])->columns(2),

                Section::make('Pricing')->schema([
                    TextInput::make('price')
                        ->label('Price')
                        ->required()
                        ->numeric()
                        ->columnSpan(2),
                    Select::make('currency')
                        ->required()
                        ->options([
                            'gbp' => 'GBP (£)',
                            'usd' => 'USD ($)',
                            'eur' => 'EUR (€)',
                        ])
                        ->default('gbp'),
                    Toggle::make('is_active')
                        ->required()
                        ->default(true),
                ])->columns(3),

                Section::make('Billing Cycle')->schema([
                    Select::make('interval')
                        ->required()
                        ->options(PlanInterval::class)
                        ->default(PlanInterval::MONTH->value),
                    TextInput::make('interval_count')
                        ->required()
                        ->numeric()
                        ->default(1),
                ])->columns(2),

                Section::make('Stripe')->schema([
                    TextInput::make('stripe_price_id')
                        ->hidden(),
                ])->columns(1),

                Section::make('Features')->schema([
                    CodeEditor::make('features')
                        ->language(Language::Json)
                        ->formatStateUsing(fn ($state) => blank($state) ? null : (is_array($state) ? json_encode($state, JSON_PRETTY_PRINT) : $state))
                        ->dehydrateStateUsing(fn ($state) => blank($state) ? null : json_decode($state, true))
                        ->columnSpanFull(),
                ])->columns(1),

                Section::make('Limitations')->schema([
                    CodeEditor::make('limitations')
                        ->language(Language::Json)
                        ->formatStateUsing(fn ($state) => blank($state) ? null : (is_array($state) ? json_encode($state, JSON_PRETTY_PRINT) : $state))
                        ->dehydrateStateUsing(fn ($state) => blank($state) ? null : json_decode($state, true))
                        ->columnSpanFull(),
                ])->columns(1),
            ])->columns(1);
    }
}
