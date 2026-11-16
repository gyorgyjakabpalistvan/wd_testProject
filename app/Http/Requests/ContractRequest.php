<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContractRequest extends FormRequest
{
    public function rules(): array
    {
        $required = $this->isMethod('PATCH') ? 'sometimes' : 'required';

        return [
            'number' => [$required, 'string', 'max:255', Rule::unique('contracts', 'number')->ignore($this->route('contract'))],
            'partner_name' => [$required, 'string', 'max:255'],
            'valid_from' => [$required, 'date'],
            'valid_to' => ['nullable', 'date', 'after_or_equal:valid_from'],
        ];
    }
}
