<?php

namespace Modules\PaymentGateway\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'stripe_key' => 'required',
            'stripe_secret' => 'required',
            'currency_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'stripe_key.required' => trans('translate.Stripe key is required'),
            'stripe_secret.required' => trans('translate.Stripe secret is required'),
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
