<?php

use App\Models\User;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use function Laravel\Folio\{middleware, name};
use App\Traits\ClearsFilters;
use Livewire\Attributes\Layout;

name('users.index');
middleware(['auth', 'verified', 'role:admin,organizer']);
new #[Layout('layouts.admin')] class extends Component {

    use Toast, ClearsFilters;
    use WithPagination;

    public string $search = '';

    public bool $drawer = false;
    public array $sortBy = ['column' => 'title', 'direction' => 'desc'];

    public int $perPage = 10;


    // Filter count
    public function filters()
    {
        $count = 0;

        if (!empty($this->search)) {
            $count++;
        }


        return $count;
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'email', 'label' => 'Email', 'class' => 'w-64'],
            ['key' => 'created_at', 'label' => 'Created At', 'class' => 'w-24'],
            ['key' => 'actions', 'label' => 'Actions', 'class' => 'w-24'],
        ];
    }

    public function users()
    {
        return User::query()
            ->where('account_id', auth()->user()->account_id)
            ->when($this->search, function () {
                return User::where('name', 'like', $this->search . '%');
            })->paginate($this->perPage);
    }


    public function with(): array
    {
        return [
            'users' => $this->users(),
            'headers' => $this->headers(),
            'filters' => $this->filters(),
        ];
    }

    public function delete(int $id)
    {
        FacadesGate::authorize('delete-user', User::findOrFail($id));
        $product = User::findOrFail($id);
        $product->delete();
        $this->toast('success', 'User deleted successfully');
    }

    public function edit(int $id)
    {
        $slug = User::findOrFail($id);
        return redirect()->route('users.update', ['user' => $slug]);
    }

    public function show(int $id)
    {
        $slug = User::findOrFail($id);
        return redirect()->route('users.show', ['user' => $slug]);
    }
};
?>
<x-slot name="title">
    {{ 'List all users' }}
</x-slot>

<div class="flex flex-col flex-1">
    <div class="flex flex-col  flex-1 pb-5 mx-auto  w-full">
        <div class="relative flex-1 w-full ">
            @can('create-user')
            <div class="flex justify-end mb-4">
                <x-ui.text-link href="{{ route('users.create') }}" class="btn-ghost btn-sm text-red-600">
                    <x-icon name="o-plus" />
                    Create User
                </x-ui.text-link>
            </div>
            @endcan

            <div class="pb-5">
                <div class="mx-auto space-y-6">

                    <x-header title="Users" separator progress-indicator>
                        <x-slot:middle class="!justify-end">
                            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
                        </x-slot:middle>
                        <x-slot:actions>
                            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" :badge="$filters" />
                        </x-slot:actions>
                    </x-header>

                    <x-card shadow>
                        @if($users && $users->count())
                        <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy" with-pagination
                            with-pagination
                            per-page="perPage"
                            :per-page-values="[3, 5, 10]">
                            @scope('actions', $user)
                            <div class="flex space-x-2">
                                @can('delete-user', $user)
                                <x-button wire:click="delete({{ $user['id'] }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-red-600" icon="o-trash" />
                                @endcan
                                @can('update-user', $user)
                                <x-button wire:click="edit({{ $user['id'] }})" class="btn-ghost btn-sm text-red-600" icon="c-pencil-square" />
                                @endcan
                                @can('view-user', $user)
                                <x-button wire:click="show({{ $user['id'] }})" class="btn-ghost btn-sm text-red-600" icon="o-link" />
                                <x-button wire:click="registrations({{ $user['id'] }})" class="btn-ghost btn-sm text-red-600" icon="o-user" />
                                @endcan
                            </div>
                            @endscope
                        </x-table>
                        @else
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            No users found.
                        </div>
                        @endif
                    </x-card>

                    <!-- FILTER DRAWER -->
                    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
                        <div class="grid gap-5">
                            <x-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass"
                                @keydown.enter="$wire.drawer = false" />

                        </div>

                        <x-slot:actions>
                            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
                            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
                        </x-slot:actions>
                    </x-drawer>

                </div>
            </div>
        </div>
    </div>
</div>