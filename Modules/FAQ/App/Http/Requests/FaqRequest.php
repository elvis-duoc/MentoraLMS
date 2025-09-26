<?php

namespace Modules\FAQ\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'question' => 'required',
            'answer' => 'required',
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
            'question.required' => trans('translate.Question is required'),
            'answer.required' => trans('translate.Answer is required')
        ];
    }
}
