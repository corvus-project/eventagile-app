<?php

namespace App\Filament\Resources\Tenants\Pages;

use App\Filament\Resources\Tenants\TenantResource;
use App\Models\Tenant;
use App\Models\User;
use Filament\Pages\Concerns\InteractsWithHeaderActions;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\DB;
use Override;

class ListUsers extends Page implements HasTable
{
    use InteractsWithRecord, InteractsWithTable,   InteractsWithHeaderActions;

    protected static string $resource = TenantResource::class;

    protected string $view = 'filament.resources.tenants.pages.list-users';

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    #[Override]
    public function    getTitle(): string|Htmlable
    {
        return  'Users: ' . $this->record->name;
    }

    public function table(Table $table): Table
    {
        $tenant = Tenant::query()->where('id', $this->record->id)->first();
        config(['database.connections.template_tenant_connection.database' => database_path($tenant->tenancy_db_name)]);

        return $table
            ->query(User::on('template_tenant_connection')->with('roles'))
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('email_verified_at')->dateTime(),
                TextColumn::make('roles.name'),
            ])
            ->filters([
                //
            ]);
    }
}
