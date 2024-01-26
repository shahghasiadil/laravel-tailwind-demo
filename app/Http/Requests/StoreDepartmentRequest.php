<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'default_contact' => 'required|string',
            'phone' => 'required|numeric',
            'whatsapp' => 'required|numeric',
            'telegram' => 'required|numeric',
            'email' => 'required|email',
            'categories' => 'required|array'
        ];
    }
}
