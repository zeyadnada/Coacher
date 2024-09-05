<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSubscriptionRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'whatsapp_phone' => 'required|string|max:15',
            'starting_date' => 'required|date',
            'payment_method' => 'required',
            'package_id' => 'required|exists:training_packages,id',
            'trainer_id' => 'nullable|exists:trainers,id',


        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'whatsapp_phone' => 'WhatsApp Phone',
            'starting_date' => 'Starting Date',
            'payment_method' => 'Payment Method',
            'package_id' => 'Package',
            'trainer_id' => 'Trainer',

        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'الاسم لا يمكن أن يزيد عن 255 حرفًا.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.string' => 'البريد الإلكتروني يجب أن يكون نصًا.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالح.',
            'email.max' => 'البريد الإلكتروني لا يمكن أن يزيد عن 255 حرفًا.',
            'whatsapp_phone.required' => 'حقل رقم واتساب مطلوب.',
            'whatsapp_phone.string' => 'رقم واتساب يجب أن يكون نصًا.',
            'whatsapp_phone.max' => 'رقم واتساب لا يمكن أن يزيد عن 15 حرفًا.',
            'starting_date.date' => 'تاريخ البدء يجب أن يكون تاريخًا صالحًا.',
            'starting_date.required' => 'حقل تاريخ البدء مطلوب.',
            'payment_method.required' => 'حقل وسيلة الدفع مطلوب.',
            'package_id.required' => 'حقل الباقة مطلوب.',
            'package_id.exists' => 'الباقة المحددة غير موجودة.',
            'trainer_id.exists' => 'المدرب المحدد غير موجود.',
        ];
    }
}
