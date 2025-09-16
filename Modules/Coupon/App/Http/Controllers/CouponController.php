<?php

namespace Modules\Coupon\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Coupon\App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Modules\Coupon\App\Models\CouponHistory;

class CouponController extends Controller
{


    public function apply_coupon(Request $request){

        $request->validate([
            'coupon_code' => 'required|exists:coupons,coupon_code'
        ], [
            'coupon_code.required' => trans('translate.Coupon is required'),
            'coupon_code.exists' => trans('translate.Coupon not found'),
        ]);


        $coupon = Coupon::where(['coupon_code' => $request->coupon_code, 'status' => 'enable'])->firstOrFail();

        if($coupon->expired_date < date('Y-m-d')){

            $notify_message = trans('translate.Coupon already expired');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        Session::put('coupon_code', $request->coupon_code);
        Session::put('offer_percentage', $coupon->offer_percentage);

        $notify_message = trans('translate.Coupon applied succussful');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function store_coupon_history($buyer_id, $coupon_amount,  $coupon_code){

        $coupon = Coupon::where(['coupon_code' => $coupon_code,])->first();

        if($coupon){
            $coupon_history = new CouponHistory();
            $coupon_history->buyer_id = $buyer_id;
            $coupon_history->coupon_id = $coupon->id;
            $coupon_history->coupon_amount = $coupon_amount;
            $coupon_history->save();
        }

    }
}
