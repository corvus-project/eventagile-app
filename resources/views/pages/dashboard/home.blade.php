<?php

use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

new #[Layout('layouts.admin')]  class extends Component
{
    use WithPagination;
    use Toast;
    public int $perPage = 10;
    public string $search = '';
    public array $sortBy = ['column' => 'start_time', 'direction' => 'desc'];

    public function mount() {}
};
?>

<x-slot name="title">
    {{ __('Dashboard') }}
</x-slot>

<x-slot name="header">
    <h2 class="text-3xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Dashboard') }}
    </h2>
</x-slot>


<div class="flex flex-col flex-1">
    <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
        <div class="relative flex-1 w-full ">
            <div class="flex justify-between items-center w-full bg-pink- overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
                <div class="flex relative flex-col   h-full w-full">


                    <div class="mx-auto min-w-full">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>