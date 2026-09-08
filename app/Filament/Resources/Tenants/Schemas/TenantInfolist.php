<?php

namespace App\Filament\Resources\Tenants\Schemas;

use App\Filament\Resources\Users\UserResource;
use App\Models\AccountSetup;
use App\Models\Tenant;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TenantInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextEntry::make('id')->label('ID'),
                    TextEntry::make('name')->label('Name'),
                    TextEntry::make('email')
                        ->label('Email address'),

                    TextEntry::make('tenancy_db_name')
                        ->label('Tenant Database Name'),

                    Actions::make([

                        Action::make('setup-account')
                            ->modalDescription('Would you like to login to this tenant?')
                            ->requiresConfirmation()
                            ->color('danger')
                            ->action(function ($record) {

                                // @TODO move the logic to a service and find the admin role in tenant db
                                $tenant = Tenant::find($record->id);
                                $user = User::find($record->user_id);
                                $tenant_domain = $tenant->primary_domain;
                                AccountSetup::create([
                                    'user_id' => $user->id,
                                    'name' => $tenant->name,
                                    'email' => $tenant->email,
                                    'domain' => $tenant_domain,
                                    'action' => 'RESETUP'
                                ]);
                            }),
                        Action::make('login-account')
                            ->modalDescription('Would you like to login to this tenant?')
                            ->requiresConfirmation()
                            ->action(function ($record) {

                                // @TODO move the logic to a service and find the admin role in tenant db
                                $tenant = Tenant::find($record->id);

                                // Set the database connection for the tenant

                                $tenancy_db_name = config('services.tenancy.db_path') . $tenant->tenancy_db_name;

                                config(['database.connections.template_tenant_connection.database' => $tenancy_db_name]);
                                $user = User::on('template_tenant_connection')->with('roles')->whereHas('roles', fn($q) => $q->where('slug', 'admin'))->first();

                                $redirectUrl = 'dashboard';
                                $token = tenancy()->impersonate($tenant, $user->id, $redirectUrl);
                                $tenant_domain = $tenant->primary_domain;
                                $domain = str_replace(['http://', 'https://'], '', config('app.url'));

                                if (env('APP_ENV') === 'local') {
                                    $ssl = 'http://';
                                } else {
                                    $ssl = 'https://';
                                }

                                return redirect("{$ssl}{$tenant_domain}/impersonate/{$token->token}");
                            })
                    ]),
                ])->columns(2),


                Section::make()->schema([
                    TextEntry::make('user.id')->label('ID'),
                    TextEntry::make('user.name')
                        ->label('Name')
                        ->url(fn($record) => UserResource::getUrl('view', ['record' => $record->user_id])),
                    TextEntry::make('user.email')
                        ->label('Email address'),

                ])->columns(2),



                RepeatableEntry::make('domains')
                    ->label('Domains')
                    ->schema([
                        TextEntry::make('domain')->label('Domain'),

                    ])
                    ->columns(1),

                RepeatableEntry::make('subscriptions')
                    ->label('Subscriptions')
                    ->schema([
                        TextEntry::make('domain')->label('Domain'),
                    ])
                    ->columns(1)

            ])

            ->columns(1);
    }
}
