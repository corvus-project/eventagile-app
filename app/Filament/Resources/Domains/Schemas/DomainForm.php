<?php

namespace App\Filament\Resources\Domains\Schemas;

use App\Models\Tenant;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DomainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('domain')
                    ->required(),


                Select::make('tenant_id')
                    ->label('Tenant')
                    ->relationship('tenant') // Keep this for the relation, but remove titleAttribute
                    ->getOptionLabelFromRecordUsing(fn(Tenant $record): string => "$record->name ($record->id)")
                    ->preload()
                    ->options(
                        Tenant::all()
                            ->mapWithKeys(fn(Tenant $tenant) => [$tenant->id => "$tenant->name ($tenant->id)"])
                            ->toArray()
                    )
                    ->searchable(['name', 'email', 'id'])
                    ->loadingMessage('Loading tenants...')
                    ->getSearchResultsUsing(
                        fn(string $search): array => Tenant::query()
                            ->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('id', 'like', "%{$search}%")
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(fn(Tenant $tenant) => [$tenant->id => "$tenant->name ($tenant->id)"])
                            ->all()
                    )



            ]);
    }
}
