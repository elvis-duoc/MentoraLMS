<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BecomeInstructorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'designation' => 'required|max:255',
            'instructor_experience' => 'required|max:100|numeric',
            'about_me' => 'required',
            'country' => 'required|max:255',
            'state' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',

        ];
    }


    public function messages(): array
    {
        return [
            'designation.required' => trans('translate.Designation is required'),
            'instructor_experience.required' => trans('translate.Experience is required'),
            'about_me.required' => trans('translate.Short Bio is required'),
            'country.required' => trans('translate.Country is required'),
            'state.required' => trans('translate.State is required'),
            'city.required' => trans('translate.City is required'),
            'address.required' => trans('translate.Address is required'),
        ];
    }
}
