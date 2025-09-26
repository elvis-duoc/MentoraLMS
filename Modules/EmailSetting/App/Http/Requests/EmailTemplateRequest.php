<?php

namespace Modules\EmailSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'subject'=>'required',
            'description'=>'required',
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
            'subject.required' => trans('translate.Subject is required'),
            'description.required' => trans('translate.Description is required'),
        ];
    }
}
