<?php

namespace App\Filament\Resources\Subscriptions\Pages;

use App\Filament\Resources\Subscriptions\SubscriptionResource;
use App\Models\Plan;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscription extends CreateRecord
{
    protected static string $resource = SubscriptionResource::class;



    protected function beforeCreate(): void
    {
        $formData = $this->data;
        $user = User::find($formData['user_id']);
        if ($this->hasActiveSubscription($user)) {
            Notification::make()
                ->warning()
                ->title('The user has an active subscription!')
                ->persistent()
                ->send();

            $this->halt();
        }
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $plan = Plan::find($data['plan_id']);
        $data['interval'] = $plan->interval;
        $data['plan_limitations'] = json_decode($plan->limitations);
        $data['plan_features'] = json_decode($plan->features);
        $data['plan_name'] = $plan->name;
        $data['plan_description'] = $plan->description;
        return $data;
    }


    protected function hasActiveSubscription(User $user): bool
    {
        return $user->subscriptions()
            ->where('status', 'active')
            ->where('ends_at', '>', now())
            ->exists();
    }
}
