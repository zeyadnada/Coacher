<?php

namespace App\Http\Requests;

use App\Models\Trainer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'location' => ['nullable', 'string', 'max:255'],
            // 'phone' => ['required', 'string', 'max:15', Rule::unique('trainers', 'phone')->ignore(2)],
            // 'email' => ['required', 'email', Rule::unique('trainers', 'email')->ignore(2)],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            'experiences' => ['nullable', 'string'],
            'certificates' => ['nullable', 'string'],
        ];
    }
}
