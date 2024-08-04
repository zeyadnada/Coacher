<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequet extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'package_id' => 'required|exists:training_packages,id',
            'trainer_id' => 'nullable|exists:trainers,id',
            'age' => 'required|integer|min:0',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'whatsapp_phone' => 'required|string|max:15',
            'starting_date' => 'nullable|date',
            'status' => 'required|in:Pending,Paid,Cancelled',
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'User',
            'package_id' => 'Package',
            'trainer_id' => 'Trainer',
            'age' => 'Age',
            'height' => 'Height',
            'weight' => 'Weight',
            'whatsapp_phone' => 'WhatsApp Phone',
            'starting_date' => 'Starting Date',
            'status' => 'Payment Status',
        ];
    }
}