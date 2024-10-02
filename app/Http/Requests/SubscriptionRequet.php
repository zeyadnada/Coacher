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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'whatsapp_phone' => 'required|string|max:15',
            'starting_date' => 'nullable|date',
            'package_id' => 'required|exists:training_packages,id',
            'duration_id' => 'required|exists:training_package_durations,id',
            'trainer_id' => 'nullable|exists:trainers,id',
            'payment_status' => 'required|in:Pending,Paid,Cancelled',
            'transaction_id' => 'sometimes|string|max:255',
            'amount_paid' => 'required|numeric|min:0|max:999999.99',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'package_id' => 'Package',
            'duration_id' => 'Package Duration',
            'trainer_id' => 'Trainer',
            'whatsapp_phone' => 'WhatsApp Phone',
            'starting_date' => 'Starting Date',
            'payment_status' => 'Payment Status',
            'transaction_id' => 'Transaction ID',
            'amount_paid' => 'Amount Paid',

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

            'package_id.required' => 'حقل الباقة مطلوب.',
            'package_id.exists' => 'الباقة المحددة غير موجودة.',

            'duration_id.required' => 'حقل مدة الباقة مطلوب.',
            'duration_id.exists' => 'المدة المحددة غير موجودة.',

            'trainer_id.exists' => 'المدرب المحدد غير موجود.',

            'starting_date.date' => 'تاريخ البدء يجب أن يكون تاريخًا صالحًا.',

            'payment_status.required' => 'حقل حالة الدفع مطلوب.',
            'payment_status.in' => 'حالة الدفع يجب أن تكون واحدة من: Pending، Paid، Cancelled.',

            'transaction_id.required' => 'حقل معرف المعاملة مطلوب.',
            'transaction_id.string' => 'معرف المعاملة يجب أن يكون نصًا.',
            'transaction_id.max' => 'معرف المعاملة لا يمكن أن يزيد عن 255 حرفًا.',

            'amount_paid.required' => 'حقل المبلغ المدفوع مطلوب.',
            'amount_paid.numeric' => 'المبلغ المدفوع يجب أن يكون رقمًا.',
            'amount_paid.min' => 'المبلغ المدفوع يجب أن يكون على الأقل 0.',
            'amount_paid.max' => 'المبلغ المدفوع لا يمكن أن يتجاوز 999999.99.',
        ];
    }
}