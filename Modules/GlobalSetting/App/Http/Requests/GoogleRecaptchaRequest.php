<?php

namespace Modules\GlobalSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoogleRecaptchaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'site_key' => 'required',
            'secret_key' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'site_key.required' => trans('translate.Site key is required'),
            'secret_key.required' => trans('translate.Secret key is required'),
        ];
    }
}
