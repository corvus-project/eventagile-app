<?php

namespace App\Filament\Resources\Subscriptions\Pages;

use App\Filament\Resources\Subscriptions\SubscriptionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscription extends CreateRecord
{
    protected static string $resource = SubscriptionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $plan = \App\Models\Plan::find($data['plan_id']);

        $data['plan_features'] = $plan->features;
        $data['plan_limitations'] = $plan->limitations;

        $data['plan_name'] = $plan->name;
        $data['plan_description'] = $plan->description;
        return $data;
    }
}
