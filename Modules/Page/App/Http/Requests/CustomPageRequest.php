<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomPageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            $rules = [
                'description' => 'required',
                'page_name' => 'required|unique:custom_page_translations',
                'slug' => 'required|unique:custom_pages',
            ];
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [
                    'description' => 'required',
                    'page_name' => 'required',
                    'slug' => 'required|unique:custom_pages,slug,'.$this->custom_page
                ];
            }else{
                $rules = [
                    'description' => 'required',
                    'page_name' => 'required',
                ];
            }
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'page_name.required' => trans('translate.Page name is required'),
            'page_name.unique' => trans('translate.Page name already exist'),
            'slug.required' => trans('translate.Slug is required'),
            'slug.unique' => trans('translate.Slug already exist'),
            'description.required' => trans('translate.Description is required'),
        ];
    }
}
