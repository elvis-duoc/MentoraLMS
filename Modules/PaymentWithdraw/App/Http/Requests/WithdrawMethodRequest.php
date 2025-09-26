<?php

namespace Modules\PaymentWithdraw\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawMethodRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'method_name'=>'required',
            'min_amount'=>'required|numeric',
            'max_amount'=>'required|numeric',
            'withdraw_charge'=>'required|numeric',
            'description'=>'required',
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'method_name.required' => trans('translate.Name is required'),
            'description.required' => trans('translate.Description is required'),
            'min_amount.required' => trans('translate.Minimum amount is required'),
            'min_amount.numeric' => trans('translate.Minimum amount should be numeric'),
            'max_amount.required' => trans('translate.Maximum amount is required'),
            'max_amount.numeric' => trans('translate.Maximum amount should be numeric'),
            'withdraw_charge.required' => trans('translate.Withdraw Charge is required'),
            'withdraw_charge.numeric' => trans('translate.Withdraw Charge should be numeric'),

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
