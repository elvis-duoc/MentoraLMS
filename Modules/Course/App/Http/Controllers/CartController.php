<?php

namespace Modules\Course\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Course\App\Models\Course;
use Illuminate\Support\Facades\Session;
use Modules\Currency\App\Models\Currency;
use Modules\PaymentGateway\App\Models\PaymentGateway;

class CartController extends Controller
{

    public $payment_setting;

    public function __construct()
    {
        $payment_data = PaymentGateway::all();

        $this->payment_setting = array();

        foreach($payment_data as $data_item){
            $payment_setting[$data_item->key] = $data_item->value;
        }

        $this->payment_setting  = (object) $payment_setting;
    }

    public function index()
    {

        $carts = session()->get('cart', []);

        $breadcrumb_title = trans('translate.Shopping Cart');

        $cart_items = [];

        $sub_total_amount = 0;
        $coupon_amount = 0;

        foreach($carts as $cart){

            $course = Course::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $cart['course_id']])->first();

            if($course){
                $cart_items[] = (object)array(
                    'id' => $cart['course_id'],
                    'qty' => $cart['qty'],
                    'price' => $cart['price'],
                    'title' => $course?->title,
                    'slug' => $course?->slug,
                    'thumb_image' => $course?->thumb_image
                );

                $sub_total_amount += $cart['price'];
            }
        }

        if(Session::get('coupon_code') && Session::get('offer_percentage')) {
            $offer_percentage = Session::get('offer_percentage');
            $coupon_amount = ($offer_percentage / 100) * $sub_total_amount;
        }

        $total_amount = $sub_total_amount - $coupon_amount;


        $razorpay_currency = Currency::findOrFail($this->payment_setting->razorpay_currency_id);
        $flutterwave_currency = Currency::findOrFail($this->payment_setting->flutterwave_currency_id);
        $paystack_currency = Currency::findOrFail($this->payment_setting->paystack_currency_id);

        $auth_user = Auth::guard('web')->user();

        return view('course::payment', [
            'breadcrumb_title' => $breadcrumb_title,
            'cart_items' => $cart_items,
            'sub_total_amount' => $sub_total_amount,
            'coupon_amount' => $coupon_amount,
            'total_amount' => $total_amount,
            'payable_amount' => $total_amount,
            'payment_setting' => $this->payment_setting ,
            'razorpay_currency' => $razorpay_currency ,
            'flutterwave_currency' => $flutterwave_currency ,
            'paystack_currency' => $paystack_currency ,
            'user' => $auth_user ,
        ]);
    }



    public function store(Request $request, $cours_id)
    {
        $cart = session()->get('cart', []);

        $course = Course::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $cours_id])->first();

        if(!$course){
            $message = trans('translate.Your requested course not found');
            return response()->json([
                'message' => $message
            ], 403);
        }

        if($course->offer_price){
            $price = $course->offer_price;
        }else{
            $price = $course->regular_price;
        }

        $qty = $request->qty;

        if (isset($cart[$cours_id])) {

            $message = trans('translate.Course already added to your cart');
            return response()->json([
                'message' => $message
            ], 403);

        } else {

            $cart[$cours_id] = [
                'course_id' => $cours_id,
                'price' => $price,
                'qty' => 1,
            ];
        }

        session()->put('cart', $cart);

        $message = trans('translate.Course added successfully to your cart');
        return response()->json([
            'message' => $message
        ]);

    }


    public function destroy($cours_id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$cours_id])) {
            unset($cart[$cours_id]);
            session()->put('cart', $cart);

            $notify_message= trans('translate.Course removed from cart');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->back()->with($notify_message);

        }

        $notify_message= trans('translate.Item not found in cart!');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
        return redirect()->back()->with($notify_message);

    }


}
