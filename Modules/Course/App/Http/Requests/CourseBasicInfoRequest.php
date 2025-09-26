<?php

namespace Modules\Course\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseBasicInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            $rules = [
                'user_id'=>'required|exists:users,id',
                'title'=>'required|max:255',
                'slug'=>'required|unique:courses|max:255',
                'regular_price'=>'required|numeric',
                'offer_price'=>'nullable|numeric',
                'category_id'=>'required|exists:categories,id',
                'course_level_id'=>'required|exists:course_levels,id',
                'course_language_id'=>'required|exists:course_languages,id',
                'total_lesson'=>'required|numeric',
                'total_duration'=>'required|numeric',
                'short_description'=>'required',
                'description'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [

                    'user_id'=>'required|exists:users,id',
                    'title'=>'required|max:255',
                    'regular_price'=>'required|numeric',
                    'offer_price'=> 'nullable|numeric',
                    'category_id'=>'required|exists:categories,id',
                    'course_level_id'=>'required|exists:course_levels,id',
                    'course_language_id'=>'required|exists:course_languages,id',
                    'total_lesson'=>'required|numeric',
                    'total_duration'=>'required|numeric',
                    'short_description'=>'required',
                    'description'=>'required',

                ];
            }else{
                $rules = [
                    'title'=>'required',
                    'short_description'=>'required',
                    'description'=>'required',
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
        return  [
            'user_id.required' => trans('translate.Instructor is required'),
            'user_id.exists' => trans('translate.The selected instructor does not exist'),
            'title.required' => trans('translate.The course title is required'),
            'title.max' => trans('translate.The course title may not be greater than 255 characters'),
            'slug.required' => trans('translate.The course slug is required'),
            'slug.unique' => trans('translate.The course slug must be unique'),
            'slug.max' => trans('translate.The course slug may not be greater than 255 characters'),
            'regular_price.required' => trans('translate.The regular price is required'),
            'regular_price.numeric' => trans('translate.The regular price must be a number'),
            'offer_price.numeric' => trans('translate.The offer price must be a number'),
            'category_id.required' => trans('translate.Category is required'),
            'category_id.exists' => trans('translate.The selected category does not exist'),
            'course_level_id.required' => trans('translate.Course level is required'),
            'course_level_id.exists' => trans('translate.The selected course level does not exist'),
            'course_language_id.required' => trans('translate.Course language is required'),
            'course_language_id.exists' => trans('translate.The selected course language does not exist'),
            'total_lesson.required' => trans('translate.Total lesson is required'),
            'total_lesson.numeric' => trans('translate.Total lesson must be a number'),
            'total_duration.required' => trans('translate.Total duration is required'),
            'total_duration.numeric' => trans('translate.Total duration must be a number'),
            'short_description.required' => trans('translate.Short description is required'),
            'description.required' => trans('translate.Description is required'),
        ];
    }
}
