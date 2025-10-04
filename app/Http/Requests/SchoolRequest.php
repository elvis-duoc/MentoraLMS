<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
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
        $schoolId = $this->route('school') ? $this->route('school')->id : null;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('schools', 'name')->ignore($schoolId)
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('schools', 'slug')->ignore($schoolId)
            ],
            'logo' => [
                'nullable',
                'image',
                'mimes:jpeg,jpg,png,gif',
                'max:2048'
            ],
            'primary_color' => [
                'required',
                'string',
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'
            ],
            'secondary_color' => [
                'required',
                'string',
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'
            ],
            'status' => [
                'required',
                'in:active,inactive'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del colegio es obligatorio.',
            'name.unique' => 'Ya existe un colegio con este nombre.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',
            'slug.unique' => 'Ya existe un colegio con este slug.',
            'slug.regex' => 'El slug solo puede contener letras minúsculas, números y guiones.',
            'logo.image' => 'El archivo debe ser una imagen.',
            'logo.mimes' => 'La imagen debe ser de tipo: jpeg, jpg, png, gif.',
            'logo.max' => 'La imagen no puede exceder los 2MB.',
            'primary_color.required' => 'El color primario es obligatorio.',
            'primary_color.regex' => 'El color primario debe ser un código hexadecimal válido.',
            'secondary_color.required' => 'El color secundario es obligatorio.',
            'secondary_color.regex' => 'El color secundario debe ser un código hexadecimal válido.',
            'status.required' => 'El estado es obligatorio.',
            'status.in' => 'El estado debe ser activo o inactivo.'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'slug' => 'slug',
            'logo' => 'logo',
            'primary_color' => 'color primario',
            'secondary_color' => 'color secundario',
            'status' => 'estado'
        ];
    }
}