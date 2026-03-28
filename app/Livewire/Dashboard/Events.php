<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class Events extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public array $sortBy = ['column' => 'start_time', 'direction' => 'desc'];

    public function events()
    {
        return Event::query()
            ->where('organizer_id', auth()->user()->id)
            ->when($this->search, function ($query) {
                $search = Str::lower($this->search);
                Log::debug('Searching events with query', ['search' => $search]);
                $query->where(function ($query) use ($search) {
                    $query->whereRaw('LOWER(title) LIKE ?', ['%' . $search . '%'])
                        ->orWhereRaw('LOWER(organizer) LIKE ?', ['%' . $search . '%'])
                        ->orWhereRaw('LOWER(location) LIKE ?', ['%' . $search . '%']);
                });
            })
            ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->paginate($this->perPage);
    }


    public function updatedSearch()
    {
        Log::debug('Search term updated', ['search' => $this->search]);

        $this->resetPage();
    }

    public function sortByColumn(string $column): void
    {
        if ($this->sortBy['column'] === $column) {
            $this->sortBy['direction'] = $this->sortBy['direction'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = ['column' => $column, 'direction' => 'asc'];
        }

        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard.events', [
            'events' => $this->events(),
        ])->layout('layouts.admin');
    }
}
