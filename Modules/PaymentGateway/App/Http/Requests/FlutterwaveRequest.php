<?php

namespace Modules\PaymentGateway\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlutterwaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'currency_id' => 'required',
            'public_key' => 'required',
            'secret_key' => 'required',
            'title' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'currency_id.required' => trans('translate.Currency is required'),
            'public_key.required' => trans('translate.Public key is required'),
            'secret_key.required' => trans('translate.Secret key is required'),
            'title.required' => trans('translate.Title is required'),
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
