<?php

namespace Modules\Language\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {

        if ($this->isMethod('post')) {
            $rules = [
                'lang_name'=>'required|unique:languages',
                'lang_code'=>'required|unique:languages'
            ];
        }

        if ($this->isMethod('put')) {
            $rules = [
                'lang_name'=>'required|unique:languages,id,'.$this->language,
                'lang_code'=>'required|unique:languages,id,'.$this->language,
            ];
        }

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
            'lang_name.required' => trans('translate.Name is required'),
            'lang_name.unique' => trans('translate.Name already exist'),
            'lang_code.required' => trans('translate.Code is required'),
            'lang_code.unique' => trans('translate.Code already exist'),
        ];
    }
}
