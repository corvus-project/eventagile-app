<?php

namespace App\Livewire\Forms;

use App\Events\EventRegistration;
use App\Exceptions\RateLimiterException;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Form;
use Illuminate\Support\Facades\Http;

class EventRegistrationForm extends Form
{
    public Event $event;

    public string $name = '';

    public string $email  = '';

    public string $phone = '';

    public ?string $registration_code = null;
 

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:registrations,email,NULL,id,event_id,' . ($this->event?->id ?? 'NULL'),
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
            ],
            'registration_code' => [
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!$this->event->is_public && $value !== $this->event->registration_code) {
                        $fail('The registration code is invalid.');
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email has already been registered for this event.',
            'phone.required' => 'Please enter your phone number.',
        ];
    }

    public function setEvent(Event $event): void
    {
        $this->event = $event;
    }
 
    public function store(): void
    {
        if (RateLimiter::tooManyAttempts('register-event:' . request()->ip(), $perMinute = 10)) {
            throw new RateLimiterException('You are registering events too quickly. Please wait a moment before trying again!.');
        }
        RateLimiter::increment('register-event:' . request()->ip());

        $this->validate();


        $eventRegistration = $this->event->registrations()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_attending' => true, // Assuming default is attending
            'registered_at' => Carbon::now(),
        ]);


        EventRegistration::dispatch($eventRegistration);


        $this->reset(['name', 'email', 'phone', 'registration_code']);


        session()->flash('register-status', 'Thank you for registering for the event!');
    }
}
