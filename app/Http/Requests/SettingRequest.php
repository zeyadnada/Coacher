<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key' => [
                'required',
                'string',
                'max:255',
                'unique:settings,key,' . $this->route('setting') // Ensure unique except for current record
            ],
            'value' => [
                'required',
                'string'  // The value must be a required string
            ],
            'is_visible' => [
                'nullable',
                'in:none,""' // Ensure is_visible is either 'none' or empty string
            ],
        ];
    }
}
