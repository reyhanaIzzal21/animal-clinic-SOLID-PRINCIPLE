<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'doctor_id'        => 'required|exists:doctors,id',
            'customer_id'      => 'required|exists:customers,id',
            'total_price'      => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'service_ids'      => 'sometimes|array',
            'service_ids.*'    => 'integer|exists:services,id',
            'pet_ids'          => 'sometimes|array',
            'pet_ids.*'        => 'integer|exists:pets,id',
        ];
    }

    public function messages(): array
    {
        return [
            'doctor_id.required' => 'Please select a doctor',
            'doctor_id.exists'   => 'Doctor does not exist',
            'customer_id.required' => 'Please select a customer',
            'customer_id.exists'   => 'Customer does not exist',
            'total_price.required' => 'Please enter a total price',
            'total_price.numeric' => 'Please enter a valid total price',
            'total_price.min'     => 'Please enter a valid total price',
            'transaction_date.required' => 'Please enter a transaction date',
            'transaction_date.date' => 'Please enter a valid transaction date',
            'service_ids.required' => 'Please select at least one service',
            'service_ids.array' => 'Please select at least one service',
            'service_ids.*.exists' => 'Service does not exist',
            'pet_ids.required' => 'Please select at least one pet',
            'pet_ids.array' => 'Please select at least one pet',
            'pet_ids.*.exists' => 'Pet does not exist',
            'pet_ids.*.integer' => 'Please select at least one pet',
        ];
    }
}
