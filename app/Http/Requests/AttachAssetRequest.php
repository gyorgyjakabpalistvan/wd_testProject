<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttachAssetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'asset_id' => [
                'required',
                'integer',
                'exists:assets,id',
                Rule::unique('contract_asset')->where('contract_id', $this->route('contract')->id),
            ],
            // a gyári szám eszköztípusonként egyedi
            'serial_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('contract_asset')->where('asset_id', $this->input('asset_id')),
            ],
        ];
    }
}
