<?php

namespace Modules\PaymentGateway\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaypalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'paypal_client_id' => 'required',
            'paypal_secret_key' => 'required',
            'currency_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'paypal_client_id.required' => trans('translate.Client id is required'),
            'paypal_secret_key.required' => trans('translate.Client secret is required'),
            'currency_id.required' => trans('translate.Currency is required'),
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
