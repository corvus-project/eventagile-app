<?php

namespace App\Filament\Resources\Tenants\Pages;

use App\Filament\Resources\Tenants\TenantResource;
use App\Models\AccountSetup;
use App\Models\Tenant;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        AccountSetup::create([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'domain' => str_slug($data['domain']),
            'action' => 'RESETUP'
        ]);
        return new Tenant();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Accout setup is on progress!!');
    }
}
