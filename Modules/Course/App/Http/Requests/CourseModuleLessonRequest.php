<?php

namespace Modules\Course\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseModuleLessonRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name'=>'required|max:255',
            'description'=>'required',
            'video_id'=>'required|max:255',
            'video_duration'=>'required|numeric',
            'serial'=>'required|numeric'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return  [
            'description.required' => trans('translate.Description is required'),
            'name.required' => trans('translate.Name is required'),
            'serial.required' => trans('translate.Serial is required'),
            'video_id.required' => trans('translate.Video is required'),
            'video_duration.required' => trans('translate.Video duration is required'),
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
