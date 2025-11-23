<?php

namespace Modules\PaymentWithdraw\App\Http\Controllers\Seller;

use Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;
use Modules\PaymentWithdraw\App\Models\WithdrawMethod;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('web')->user();

        $withdraw_list = SellerWithdraw::where('seller_id', $user->id)->latest()->get();

        $total_income = CourseEnrollmentList::whereHas('course_enrollment', function($query) {
            $query->where('payment_status', 'success');
        })->where('instructor_id', $user->id)->sum('total_amount');

        $commission_type = GlobalSetting::where('key', 'commission_type')->value('value');
        $commission_per_sale = GlobalSetting::where('key', 'commission_per_sale')->value('value');

        $total_commission = 0.00;
        $net_income = $total_income;
        if($commission_type == 'commission'){
            $total_commission = ($commission_per_sale / 100) * $total_income;
            $net_income = $total_income - $total_commission;
        }

        $pending_success_list = SellerWithdraw::where('seller_id', $user->id)->where('status', '!=', 'rejected')->sum('total_amount');

        $total_withdraw_amount = $pending_success_list;

        $current_balance = $net_income - $total_withdraw_amount;

        $pending_withdraw = SellerWithdraw::where('seller_id', $user->id)->where('status', 'pending')->sum('total_amount');

        return view('paymentwithdraw::seller.index', [
            'withdraw_list' => $withdraw_list,
            'total_income' => $total_income,
            'total_commission' => $total_commission,
            'net_income' => $net_income,
            'current_balance' => $current_balance,
            'total_withdraw_amount' => $total_withdraw_amount,
            'pending_withdraw' => $pending_withdraw,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $methods = WithdrawMethod::where('status', 'enable')->latest()->get();

        return view('paymentwithdraw::seller.create', ['methods' => $methods]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'method_id' => 'required|exists:withdraw_methods,id',
            'amount' => 'required|numeric',
            'description' => 'required',
        ],[
            'method_id.required' => trans('translate.Method is required'),
            'amount.required' => trans('translate.Amount is required'),
            'amount.numeric' => trans('translate.Amount should be numeric'),
            'description.required' => trans('translate.Bank Information is required'),
        ]);

        $user = Auth::guard('web')->user();

        $method = WithdrawMethod::findOrFail($request->method_id);

        $withdraw_list = SellerWithdraw::where('seller_id', $user->id)->where('status', '!=', 'rejected')->get();

        $already_withdraw_amount = $withdraw_list->sum('total_amount');

        $my_income = CourseEnrollmentList::whereHas('course_enrollment', function($query) {
            $query->where('payment_status', 'success');
        })->where('instructor_id', $user->id)->sum('total_amount');

        $commission_type = GlobalSetting::where('key', 'commission_type')->value('value');
        $commission_per_sale = GlobalSetting::where('key', 'commission_per_sale')->value('value');

        $total_commission = 0.00;
        $net_income = $my_income;
        if($commission_type == 'commission'){
            $total_commission = ($commission_per_sale / 100) * $my_income;
            $net_income = $my_income - $total_commission;
        }

        $current_balance = $net_income - $already_withdraw_amount;

        if($request->amount > $current_balance){
            $notify_message= trans('translate.You do not have enough balance for withdraw');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $charge_amount = ($method->withdraw_charge / 100) * $request->amount;

        $withdraw_amount = $request->amount - $charge_amount;

        $new_withdraw = new SellerWithdraw();
        $new_withdraw->seller_id = $user->id;
        $new_withdraw->withdraw_method_id = $request->method_id;
        $new_withdraw->withdraw_method_name = $method->method_name;
        $new_withdraw->total_amount = $request->amount;
        $new_withdraw->withdraw_amount = $withdraw_amount;
        $new_withdraw->charge_amount = $charge_amount;
        $new_withdraw->description = $request->description;
        $new_withdraw->save();

        $notify_message= trans('translate.Withdraw request has been send. please awaiting for admin approval');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('seller.my-withdraw.index')->with($notify_message);


    }


    public function show($id)
    {

        $user = Auth::guard('web')->user();

        $withdraw = SellerWithdraw::where(['id' => $id, 'seller_id' => $user->id])->firstOrFail();

        return view('paymentwithdraw::seller.show', [
            'withdraw' => $withdraw
        ]);
    }

}
