<?php

namespace Modules\Coupon\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        $rules = [
            'offer_percentage'=>'required|numeric|max:99',
            'expired_date'=>'required',
        ];

        if ($this->isMethod('post')) {
            $rules['coupon_code'] = 'required|max:20|unique:coupons';
        }else{
            $rules['coupon_code'] = 'required|max:20|unique:coupons,coupon_code,'.$this->coupon.'id';
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
        return [
            'coupon_code.required' => trans('translate.Coupon code is required'),
            'coupon_code.unique' => trans('translate.Coupon already exist'),
            'offer_percentage.required' => trans('translate.Offer percentage is required'),
            'expired_date.required' => trans('translate.Expired date is required'),
        ];
    }
}
