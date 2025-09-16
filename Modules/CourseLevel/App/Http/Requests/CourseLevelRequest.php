<?php

namespace Modules\CourseLevel\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseLevelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name'=>'required',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('translate.Name is required'),
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
