<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Please enter a name.',
            'email.required'   => 'Please enter an email.',
            'adderss.required' => 'Please enter an address.',
            'phone.required'   => 'Please enter a phone number.',
        ];
    }
}
