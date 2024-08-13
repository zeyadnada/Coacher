<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditProfileRequest extends FormRequest
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
            // 'job_title' => ['required', 'string', 'max:255'],
            // 'birth_date' => ['required', 'date'],
            'admin_type' => ['required', 'in:super_admin,admin'],
            'password' => ['required','min:8','confirmed'],
            'gender' => ['required', 'in:male,female'],
            'location' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:admins,phone'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            // 'experiences' => ['nullable', 'string'],
            // 'certificates' => ['nullable', 'string'],
        ];
    }
}
