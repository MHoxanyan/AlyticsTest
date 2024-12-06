<?php

namespace App\Livewire;

use App\Models\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UrlList extends Component
{
    use WithPagination;

    protected $listeners = ['refreshUrls' => '$refresh'];

    public function render()
    {
        $urls = Url::query()
            ->withCount('checks')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('livewire.url-list', compact('urls'));
    }
}
