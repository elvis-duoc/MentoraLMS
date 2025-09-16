<?php

namespace Modules\PaymentGateway\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MollieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'mollie_currency_id' => 'required',
            'mollie_key' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'mollie_currency_id.required' => trans('translate.Currency is required'),
            'mollie_key.required' => trans('translate.Mollie key is required'),
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
