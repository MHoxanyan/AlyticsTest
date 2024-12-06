<?php

namespace App\Livewire;

use App\Models\Url;
use Livewire\Component;

class CreateUrl extends Component
{
    public $url;
    public $frequency;
    public $retry;
    public $retry_frequency;

    public function save()
    {
        $data = $this->validate([
            'url' => ['required', 'string', 'url', 'max:254'],
            'frequency' => ['required', 'int', 'min:1'],
            'retry' => ['nullable', 'int', 'min:0'],
            'retry_frequency' => ['required_with:retry', 'int', 'min:1'],
        ]);

        $url = Url::query()->create($data);
        return $this->redirectRoute('checks', ['url_id' => $url->id]);
    }
    public function render()
    {
        return view('livewire.create-url');
    }
}
