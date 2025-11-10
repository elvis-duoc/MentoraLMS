<?php

namespace Modules\Currency\App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Currency\App\Models\Currency;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Modules\Currency\App\Http\Requests\CurrencyRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multi_currencies = Currency::latest()->get();


        return view('currency::index', ['multi_currencies' => $multi_currencies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('currency::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {

        if($request->is_default){
            DB::table('currencies')->update(['is_default' => 'no']);
        }

        $currency = new Currency();
        $currency->currency_name = $request->currency_name;
        $currency->currency_code = $request->currency_code;
        $currency->country_code = $request->country_code;
        $currency->currency_icon = $request->currency_icon;
        $currency->currency_rate = $request->currency_rate;
        $currency->currency_position = $request->currency_position;
        $currency->status = $request->status ? 'active' : 'inactive';
        $currency->is_default = $request->is_default ? 'yes' : 'no';
        $currency->save();


        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.multi-currency.index')->with($notify_message);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);

        return view('currency::edit', ['currency' => $currency]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);

        if($request->is_default){
            DB::table('currencies')->update(['is_default' => 'no']);
        }

        if($currency->is_default == 'yes' && !$request->is_default){
            DB::table('currencies')->where('id', 1)->update(['is_default' => 'yes']);
        }

        $currency->currency_name = $request->currency_name;
        $currency->currency_code = $request->currency_code;
        $currency->country_code = $request->country_code;
        $currency->currency_icon = $request->currency_icon;
        $currency->currency_rate = $request->currency_rate;
        $currency->currency_position = $request->currency_position;
        $currency->status = $request->status ? 'active' : 'inactive';
        $currency->is_default = $request->is_default ? 'yes' : 'no';
        $currency->save();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.multi-currency.index')->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {



        $stripe_currency = PaymentGateway::where(['key' => 'stripe_currency_id'])->first();
        $paypal_currency = PaymentGateway::where(['key' => 'paypal_currency_id'])->first();
        $razorpay_currency = PaymentGateway::where(['key' => 'razorpay_currency_id'])->first();
        $flutterwave_currency = PaymentGateway::where(['key' => 'flutterwave_currency_id'])->first();
        $mollie_currency = PaymentGateway::where(['key' => 'mollie_currency_id'])->first();
        $paystack_currency = PaymentGateway::where(['key' => 'paystack_currency_id'])->first();
        $instamojo_currency = PaymentGateway::where(['key' => 'instamojo_account_mode'])->first();

        if($stripe_currency->value == $id || $paypal_currency->value == $id || $razorpay_currency->value == $id || $flutterwave_currency->value == $id || $mollie_currency->value == $id || $paystack_currency->value == $id || $instamojo_currency->value == $id ){
            $notify_message = trans('translate.You can not delete this currency, this currency connected to multiple gateway');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        if($id == 1){
            $notify_message = trans('translate.You can not delete USD currency');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('admin.language.index')->with($notify_message);
        }

        $currency = Currency::findOrFail($id);
        $currency->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.multi-currency.index')->with($notify_message);

    }
}
