<?php

namespace Modules\SeoSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'seo_title' => 'required',
            'seo_description' => 'required'
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
            'seo_title.required' => trans('translate.SEO title is required'),
            'seo_description.required' => trans('translate.SEO description is required'),
        ];
    }
}
