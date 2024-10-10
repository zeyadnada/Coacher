<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingPackageRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            'description' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
            // Durations and Prices validation
            'durations' => ['required', 'array', 'min:1'], // At least one duration is required
            'durations.*.duration' => ['required'], // Validate each duration as a required string
            'durations.*.months' => ['required', 'numeric', 'min:0'], // Validate each months as a required number with a minimum of 0
            'durations.*.price' => ['required', 'numeric', 'min:0'], // Validate each price as a required number with a minimum of 0
            'durations.*.discount_price' => ['nullable', 'numeric', 'min:0'], // Validate discount price as a numeric value, but it's optional
        ];
    }
}