<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermsConditionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'description' => 'required'
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
            'description.required' => trans('translate.Terms and condition is required')
        ];
    }
}
