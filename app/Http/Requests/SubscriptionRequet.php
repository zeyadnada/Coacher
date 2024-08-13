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
            'height' => 'required|numeric|min:50',
            'weight' => 'required|numeric|min:10',
            'whatsapp_phone' => 'required|string|max:15',
            'starting_date' => 'nullable|date',
            'status' => 'sometimes|in:Pending,Paid,Cancelled',
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



    public function messages(): array
    {
        // Check if the current route is 'xx'
        if ($this->route()->getName() === 'user.subscription.store') {
            return [
                'user_id.required' => 'حقل المستخدم مطلوب.',
                'user_id.exists' => 'المستخدم المحدد غير موجود.',
                'package_id.required' => 'حقل الباقة مطلوب.',
                'package_id.exists' => 'الباقة المحددة غير موجودة.',
                'trainer_id.exists' => 'المدرب المحدد غير موجود.',
                'age.required' => 'حقل العمر مطلوب.',
                'age.integer' => 'العمر يجب أن يكون رقمًا صحيحًا.',
                'age.min' => 'العمر يجب أن يكون 0 أو أكثر.',
                'height.required' => 'حقل الطول مطلوب.',
                'height.numeric' => 'الطول يجب أن يكون رقمًا.',
                'height.min' => 'الطول يجب أن يكون 50 أو أكثر.',
                'weight.required' => 'حقل الوزن مطلوب.',
                'weight.numeric' => 'الوزن يجب أن يكون رقمًا.',
                'weight.min' => 'الوزن يجب أن يكون 10 أو أكثر.',
                'whatsapp_phone.required' => 'حقل رقم واتساب مطلوب.',
                'whatsapp_phone.string' => 'رقم واتساب يجب أن يكون نصًا.',
                'whatsapp_phone.max' => 'رقم واتساب لا يمكن أن يزيد عن 15 حرفًا.',
                'starting_date.date' => 'تاريخ البدء يجب أن يكون تاريخًا صالحًا.',
                'status.required' => 'حقل حالة الدفع مطلوب.',
                'status.in' => 'حالة الدفع يجب أن تكون واحدة من: Pending, Paid, Cancelled.',
            ];
        }

        // Default validation messages (in English)
        return [];
    }
}