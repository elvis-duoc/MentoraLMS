<?php

namespace Modules\PaymentGateway\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstamojoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'currency_id' => 'required',
            'api_key' => 'required',
            'auth_token' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'currency_id.required' => trans('translate.Currency is required'),
            'api_key.required' => trans('translate.API key is required'),
            'auth_token.required' => trans('translate.Auth token is required'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
