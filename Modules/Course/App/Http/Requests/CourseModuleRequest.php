<?php

namespace Modules\Course\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseModuleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name'=>'required',
            'serial'=>'required|numeric'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return  [
            'name.required' => trans('translate.Name is required'),
            'serial.required' => trans('translate.Serial is required'),
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
