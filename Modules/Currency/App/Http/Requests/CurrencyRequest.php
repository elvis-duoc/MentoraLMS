<?php

namespace Modules\Currency\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            $rules = [
                'currency_name'=>'required|unique:currencies',
                'country_code'=>'required|unique:currencies',
                'currency_code'=>'required|unique:currencies',
                'currency_icon'=>'required',
                'currency_rate'=>'required|numeric',
                'currency_position'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            $rules = [
                'currency_name'=>'required|unique:currencies,currency_name,'.$this->multi_currency,
                'country_code'=>'required|unique:currencies,country_code,'.$this->multi_currency,
                'currency_code'=>'required|unique:currencies,currency_code,'.$this->multi_currency,
                'currency_icon'=>'required',
                'currency_rate'=>'required|numeric',
                'currency_position'=>'required',
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
            'currency_name.required' => trans('translate.Currency name is required'),
            'currency_name.unique' => trans('translate.Currency name already exist'),
            'country_code.required' => trans('translate.Country code is required'),
            'country_code.unique' => trans('translate.Country code already exist'),
            'currency_code.required' => trans('translate.Currency code is required'),
            'currency_code.unique' => trans('translate.Currency code already exist'),
            'currency_icon.required' => trans('translate.Currency icon is required'),
            'currency_icon.unique' => trans('translate.Currency icon already exist'),
            'currency_rate.required' => trans('translate.Currency rate is required'),
            'currency_rate.numeric' => trans('translate.Currency rate must be number'),
            'currency_position.required' => trans('translate.Currency position is required'),
        ];
    }
}
