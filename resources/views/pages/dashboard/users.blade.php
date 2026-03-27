<?php

use App\Models\User;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component {

    use Toast;
    use WithPagination;

    #[Computed()]
    public function users()
    {
        return User::query()
            ->where('account_id', auth()->user()->account_id)
            ->paginate();
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


                    <x-card shadow>

                    </x-card>


                </div>
            </div>
        </div>
    </div>
</div>