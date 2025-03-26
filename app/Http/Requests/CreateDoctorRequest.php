<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDoctorRequest extends FormRequest
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
            'name'    => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'phone'   => 'required|numeric|min:9|max:|15',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Please enter a name.',
            'specialization.required' => 'Please enter a specialization.',
            'phone.required'   => 'Please enter a phone number.',
        ];
    }
}
