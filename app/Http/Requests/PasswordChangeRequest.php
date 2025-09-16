<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
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
            'current_password' => 'required',
            'password' => 'required|min:4|max:100|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => trans('translate.Current password is required'),
            'password.required' => trans('translate.Password is required'),
            'password.confirmed' => trans('translate.Password confirmation is required'),
        ];
    }
}
