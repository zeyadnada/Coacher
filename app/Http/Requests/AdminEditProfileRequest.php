<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $adminId  = $this->route('admin'); //  Get the admin ID from the route (Will be null when creating a new admin)
        return [
            'name' => ['required', 'string', 'max:255'],
            'admin_type' => ['required', 'in:super_admin,admin'],
            'password' => ['sometimes', 'required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:male,female'],
            'location' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', Rule::unique('admins', 'phone')->ignore($adminId)],
            'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($adminId)],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
        ];
    }
}
