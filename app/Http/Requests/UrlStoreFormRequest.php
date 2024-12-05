<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UrlStoreFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @param $retry
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'url', 'max:255'],
            'frequency' => ['required', 'integer', 'min:1'],
            'retry' => ['nullable', 'integer'],
            'retry_frequency' => [Rule::when($this->retry > 1, ['required', 'integer', 'min:1'])],
        ];
    }
}
