<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Subscription')->schema([
                    Grid::make(2)->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->disabledOn('edit')
                            ->searchable()
                            ->columnSpanFull()
                            ->required(),
                        DateTimePicker::make('starts_at')->required(),
                        DateTimePicker::make('ends_at'),
                        DateTimePicker::make('trial_ends_at'),


                        Select::make('status')
                            ->options(
                                [
                                    'active' => 'Active',
                                    'inactive' => 'Inactive'
                                ]
                            )->label('Status')->required()

                    ])->columnSpanFull(),
                ]),
                Section::make('Plan Details')->schema([
                    Grid::make(1)->schema([
                        Select::make('plan_id')
                            ->required()
                            ->relationship('plan', 'name')
                            ->label('Plan')->disabledOn('edit'),
                        KeyValue::make('plan_features')->disabledOn('create'),
                        KeyValue::make('plan_limitations')->disabledOn('create')

                    ])->columnSpanFull(),

                ]),
                Textarea::make('notes')
                    ->columnSpanFull(),

                Section::make()->columns(2)->schema([

                    TextInput::make('stripe_customer_id')->hidden(),
                    TextInput::make('stripe_subscription_id')->hidden(),
                    TextInput::make('stripe_price_id')->hidden(),
                    TextInput::make('cancellation_reason')->hidden(),
                    TextInput::make('cancellation_requested_by'),
                    TextInput::make('billing_address'),
                    TextInput::make('payment_method'),
                    TextInput::make('currency')
                        ->required()
                        ->default('usd'),
                    TextInput::make('amount')
                        ->required()
                        ->numeric()
                        ->default(0),
                    TextInput::make('interval')
                        ->required()
                        ->default('month'),
                    TextInput::make('interval_count')
                        ->required()
                        ->numeric()
                        ->default(1),
                    TextInput::make('tax_rate'),
                    TextInput::make('coupon'),
                    TextInput::make('discount'),
                    TextInput::make('next_billing_date'),
                    TextInput::make('last_payment_date'),
                    TextInput::make('last_payment_status'),
                    TextInput::make('payment_gateway'),
                    TextInput::make('external_id'),
                    TextInput::make('plan_name'),
                    TextInput::make('plan_description'),
                    TextInput::make('plan_id')
                        ->required()
                        ->numeric(),
                    TextInput::make('plan_features'),
                    Textarea::make('plan_limitations')
                        ->columnSpanFull(),
                    TextInput::make('renewal_status'),
                    TextInput::make('renewal_date'),
                    TextInput::make('cancellation_date'),
                    TextInput::make('reactivation_date'),
                    TextInput::make('source'),
                    TextInput::make('utm_parameters'),
                    TextInput::make('referral_code'),
                    TextInput::make('affiliate_id'),
                    TextInput::make('metadata'),
                ])->columnSpanFull()->hidden(),
            ]);
    }
}
