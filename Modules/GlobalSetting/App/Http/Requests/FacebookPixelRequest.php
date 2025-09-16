<?php

namespace Modules\GlobalSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacebookPixelRequest extends FormRequest
{
    public function rules()
    {
        return [
            'app_id' =>'required',
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
            'app_id.required' => trans('translate.App id is required'),
        ];
    }
}
