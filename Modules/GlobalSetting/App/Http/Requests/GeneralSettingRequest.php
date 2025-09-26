<?php

namespace Modules\GlobalSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */

     public function rules()
    {
        $rules = [
            'app_name' => 'required',
            'contact_message_mail' => 'required',
        ];

        return $rules;
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
            'app_name.required' => trans('translate.App name is required'),
            'contact_message_mail.required' => trans('translate.Email is required'),
        ];
    }

}
