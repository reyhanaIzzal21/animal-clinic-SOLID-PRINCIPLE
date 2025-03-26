<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePetRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'name'        => 'required|string|max:255',
            'species'     => 'required|string|max:100',
            'age'         => 'required|integer|min:0',
            'service_ids' => 'sometimes|array',
            'service_ids.*' => 'integer|exists:services,id',
        ];
    }

    public function messages(): array|string
    {
        return [
            'name.required'    => 'Please enter a name.',
            'species.required' => 'Please enter a species.',
            'age.required'     => 'Please enter an age.',
            'service_ids.*'    => 'Please select a service.',
            'service_ids.*.exists' => 'The selected service does not exist.',
            'customer_id.required' => 'Please select a customer.',
            'customer_id.exists'   => 'The selected customer does not exist.',
        ];
    }
}
