<?php


use App\Models\Account;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

new #[Layout('layouts.frontend')]  class extends Component
{
    use WithPagination;

    public $account;


    public function mount(Account $account)
    {
        $this->account = $account;
    }

    #[Computed]
    public function events()
    {
        $users = $this->account->users()->pluck('id');

        return Event::whereIn('organizer_id', $users)->paginate(2);
    }
}
?>
<x-slot name="title">
    {{ $account->name }}
</x-slot>
<x-slot name="header">
    <h2 class="text-3xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        <a href="{{ route('account.home', $account->subdomain) }}" class="text-blue-500 hover:text-blue-700">{{ $account->name }}</a>
    </h2>
</x-slot>
<div class="pb-5">
    <div class="mx-auto space-y-6">


        @foreach($this->events as $event)
        <div class="p-4 bg-white rounded-lg shadow mt-8  dark:bg-gray-800 dark:border dark:border-gray-200/10">

            <a href="{{ route('account.event', [$this->account->subdomain, $event->slug]) }}" class="text-blue-600 hover:underline">
                <h4 class="text-lg font-semibold">{{ $event->title }}</h4>
            </a>


            <p class="text-sm text-gray-600">
                Date: {{ $event->start_time->format('F j, Y H:i') }}
                Please register until {{ $event->registration_ends_at ? $event->registration_ends_at->format('F j, Y H:i') : 'N/A' }}.
            </p>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                <x-icon name="o-envelope" /> Organizer: {{ $event->organizer }}
                <x-icon name="o-map-pin" /> Location: {{ $event->location }}
                <x-icon name="o-users" /> Capacity: {{ $event->capacity }}
            </p>
            <blockquote class="mt-2">{{ $event->description }}</blockquote>
        </div>
        @endforeach

        <div class="mt-4 flex justify-end-safe gap-1">
            {{ $this->events->links() }}
        </div>
    </div>
</div>