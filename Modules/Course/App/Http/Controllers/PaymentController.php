<?php

namespace Modules\Course\App\Http\Controllers;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Course\App\Models\Course;
use Illuminate\Support\Facades\Session;
use Modules\Currency\App\Models\Currency;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\Course\App\Models\CourseEnrollmentList;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Modules\Coupon\App\Http\Controllers\CouponController;

class PaymentController extends Controller
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


    public function stripe_payment(Request $request){

        $auth_user = Auth::guard('web')->user();

        $calculate_price = $this->calculate_price();

        $stripe_currency = Currency::findOrFail($this->payment_setting->stripe_currency_id);

        $payable_amount = round($calculate_price['total_amount'] ?? 0 * $stripe_currency->currency_rate,2);

        Stripe::setApiKey($this->payment_setting->stripe_secret);

        try{
            $result = Charge::create ([
                "amount" => $payable_amount * 100,
                "currency" => $stripe_currency->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME')
            ]);
        }catch(Exception $ex){
            Log::info('Stripe payment : '. $ex->getMessage());

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $order = $this->create_order($auth_user, 'Stripe', 'success', $result->balance_transaction);

        $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('student.enrolled-courses')->with($notify_message);

    }


    public function paypal_payment(Request $request){

        $calculate_price = $this->calculate_price();

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        $payable_amount = round($calculate_price['total_amount'] ?? 0 * $paypal_currency->currency_rate,2);

        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.paypal-success-payment'),
                "cancel_url" => route('payment.paypal-faild-payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $paypal_currency->currency_code,
                        "value" => $payable_amount
                    ]
                ]
            ]
        ]);


        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);

        } else {
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

    }


    public function paypal_success_payment(Request $request){


        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $auth_user = Auth::guard('web')->user();

            $order = $this->create_order($auth_user, 'Paypal', 'success', $request->PayerID);

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('student.enrolled-courses')->with($notify_message);

        } else {


            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('carts')->with($notify_message);
        }

    }

    public function paypal_faild_payment(Request $request){

        $notify_message = trans('translate.Something went wrong, please try again');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
        return redirect()->route('carts')->with($notify_message);
    }


    public function razorpay_payment(Request $request){

        $input = $request->all();
        $api = new Api($this->payment_setting->razorpay_key,$this->payment_setting->razorpay_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payId = $response->id;

                $auth_user = Auth::guard('web')->user();

                $order = $this->create_order($auth_user, 'Razorpay', 'success', $payId);

                $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
                return redirect()->route('student.enrolled-courses')->with($notify_message);


            }catch (Exception $e) {
                Log::info('Razorpay payment : '. $e->getMessage());
                $notify_message = trans('translate.Something went wrong, please try again');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
                return redirect()->route('carts')->with($notify_message);
            }
        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('carts')->with($notify_message);
        }
    }


    public function flutterwave_payment(Request $request){

        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $this->payment_setting->flutterwave_secret_key;
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if($response->status == 'success'){

            $auth_user = Auth::guard('web')->user();

            $order = $this->create_order($auth_user, 'Flutterwave', 'success', $tnx_id);

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success' , 'message' => $notify_message]);
        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notify_message]);
        }


    }


    public function paystack_payment(Request $request){

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $this->payment_setting->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);
        if($final_data->status == true) {

            $auth_user = Auth::guard('web')->user();

            $order = $this->create_order($auth_user, 'Paystack', 'success', $transaction);

            $notification = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success' , 'message' => $notification]);

        }else{
            $notification = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }


    }



    public function mollie_payment(Request $request){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        try{

            $calculate_price = $this->calculate_price();

            $mollie_currency = Currency::findOrFail($this->payment_setting->mollie_currency_id);

            $price = $calculate_price['total_amount'] ?? 0 * $mollie_currency->currency_rate;
            $price = sprintf('%0.2f', $price);

            $mollie_api_key = $this->payment_setting->mollie_key;

            $currency = strtoupper($mollie_currency->currency_code);

            Mollie::api()->setApiKey($mollie_api_key);

            $payment = Mollie::api()->payments()->create([
                'amount' => [
                    'currency' => $currency,
                    'value' => ''.$price.'',
                ],
                'description' => env('APP_NAME'),
                'redirectUrl' => route('payment.mollie-callback'),
            ]);

            $payment = Mollie::api()->payments()->get($payment->id);

            Session::put('payment_id', $payment->id);

            return redirect($payment->getCheckoutUrl(), 303);

        }catch (Exception $e) {
            Log::info('Mollie payment : '. $e->getMessage());
            $notify_message = trans('translate.Please provide valid mollie api key');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

    }


    public function mollie_callback(Request $request){

        $mollie_api_key = $this->payment_setting->mollie_key;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()){

            $auth_user = Auth::guard('web')->user();

            $order = $this->create_order($auth_user, 'Mollie', 'success', session()->get('payment_id'));

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('student.enrolled-courses')->with($notify_message);

        }else{

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('carts')->with($notify_message);
        }


    }


    public function instamojo_payment(Request $request){
        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $calculate_price = $this->calculate_price();

        $instamojo_currency = Currency::findOrFail($this->payment_setting->instamojo_currency_id);

        $price = $calculate_price['total_amount'] ?? 0 * $instamojo_currency->currency_rate;
        $price = round($price,2);

        try{
            $environment = $this->payment_setting->instamojo_account_mode;
            $api_key = $this->payment_setting->instamojo_api_key;
            $auth_token = $this->payment_setting->instamojo_auth_token;

            if($environment == 'Sandbox') {
                $url = 'https://test.instamojo.com/api/1.1/';
            } else {
                $url = 'https://www.instamojo.com/api/1.1/';
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url.'payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("X-Api-Key:$api_key",
                    "X-Auth-Token:$auth_token"));
            $payload = Array(
                'purpose' => env("APP_NAME"),
                'amount' => $price,
                'phone' => '918160651749',
                'buyer_name' => Auth::user()->name,
                'redirect_url' => route('payment.instamojo-callback'),
                'send_email' => true,
                'webhook' => 'http://www.example.com/webhook/',
                'send_sms' => true,
                'email' => Auth::user()->email,
                'allow_repeated_payments' => false
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($response);
            return redirect($response->payment_request->longurl);
        }catch (Exception $e) {
            Log::info('Instamojo payment : '. $e->getMessage());
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }



    }

    public function instamojo_callback(Request $request){

        $input = $request->all();

        $environment = $this->payment_setting->instamojo_account_mode;
        $api_key = $this->payment_setting->instamojo_api_key;
        $auth_token = $this->payment_setting->instamojo_auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('carts')->with($notify_message);

        } else {
            $data = json_decode($response);
        }

        if($data->success == true) {
            if($data->payment->status == 'Credit') {

                $auth_user = Auth::guard('web')->user();

                $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Instamojo', 'success', $request->get('payment_id'));

                $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
                return redirect()->route('student.enrolled-courses')->with($notify_message);

            }
        }else{

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('carts')->with($notify_message);
        }

    }


    public function bank_payment(Request $request){

        $request->validate([
            'tnx_info' => 'required|max:255'
        ],[
            'tnx_info.required' => trans('translate.Transaction field is required')
        ]);

        $auth_user = Auth::guard('web')->user();

        $order = $this->create_order($auth_user, 'Bank Payment', 'pending', $request->tnx_info);

        $notify_message = trans('translate.Your payment has been made. please wait for admin payment approval');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('student.enrolled-courses')->with($notify_message);

    }

    public function create_order($user, $payment_method, $payment_status, $transaction_id){


        $calculate_price = $this->calculate_price();

        $order = new CourseEnrollment();
        $order->order_id = substr(rand(0,time()),0,10);
        $order->student_id = $user->id;
        $order->sub_total_amount = $calculate_price['sub_total_amount'] ?? 0;
        $order->coupon_amount = $calculate_price['coupon_amount'] ?? 0;
        $order->total_amount = $calculate_price['total_amount'] ?? 0;
        $order->payment_method = $payment_method;
        $order->payment_status = $payment_status;
        $order->order_status = $payment_status == 'success' ? 'success' : 'pending';
        $order->transaction_id = $transaction_id;
        $order->save();

        $carts = session()->get('cart', []);

        foreach($carts as $cart){

            $course = Course::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $cart['course_id']])->first();

            if($course){

                $order_course = new CourseEnrollmentList();
                $order_course->course_enrollment_id = $order->id;
                $order_course->instructor_id = $course->user_id;
                $order_course->course_id = $course->id;
                $order_course->total_amount = $course->offer_price ? $course->offer_price : $course->regular_price ;
                $order_course->save();
            }
        }

        if(Session::get('coupon_code') && Session::get('offer_percentage')) {

            $coupon_history = new CouponController();
            $coupon_history->store_coupon_history($user->id, $calculate_price['coupon_amount'] ?? 0, Session::get('coupon_code'));

        }

        session()->put('cart', []);

        return $order;

    }


    public function calculate_price(){

        $carts = session()->get('cart', []);

        $sub_total_amount = 0;
        $coupon_amount = 0;

        foreach($carts as $cart){

            $course = Course::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $cart['course_id']])->first();

            if($course){
                $sub_total_amount += $cart['price'];
            }
        }

        if(Session::get('coupon_code') && Session::get('offer_percentage')) {
            $offer_percentage = Session::get('offer_percentage');
            $coupon_amount = ($offer_percentage / 100) * $sub_total_amount;
        }

        $total_amount = $sub_total_amount - $coupon_amount;

        return [
            'sub_total_amount' => $sub_total_amount,
            'coupon_amount' => $coupon_amount,
            'total_amount' => $total_amount,
        ];

    }
}
