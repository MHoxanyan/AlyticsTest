<?php

namespace App\Livewire;

use App\Models\Check;
use App\Models\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CheckList extends Component
{
    use WithPagination;

    public ?Url $url;

    protected $listeners = ['refreshChecks' => '$refresh'];

    public function mount()
    {
        $this->url = Url::find(request()->get('url_id'));
    }

    public function render()
    {
        $urlId = $this->url?->id;
        $checks = Check::query()
            ->with('url')
            ->when(
                $urlId,
                static fn($query) => $query->where('url_id', $urlId)
            )
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.check-list', compact('checks'));
    }
}
