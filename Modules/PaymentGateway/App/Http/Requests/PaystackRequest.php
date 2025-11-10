<?php

namespace Modules\PaymentGateway\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaystackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */

    public function rules(): array
    {
        return [
            'paystack_currency_id' => 'required',
            'paystack_public_key' => 'required',
            'paystack_secret_key' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'paystack_currency_id.required' => trans('translate.Currency is required'),
            'paystack_public_key.required' => trans('translate.Public key is required'),
            'paystack_secret_key.required' => trans('translate.Secret key is required'),
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
