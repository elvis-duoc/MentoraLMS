<?php

namespace Modules\PaymentWithdraw\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\PaymentWithdraw\App\Models\WithdrawMethod;
use Modules\PaymentWithdraw\App\Http\Requests\WithdrawMethodRequest;

class WithdrawMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $methods = WithdrawMethod::latest()->get();

        return view('paymentwithdraw::method.index', ['methods' => $methods]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('paymentwithdraw::method.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(WithdrawMethodRequest $request)
    {

        $method = new WithdrawMethod();
        $method->method_name = $request->method_name;
        $method->max_amount = $request->max_amount;
        $method->min_amount = $request->min_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = $request->status ? 'enable' : 'disable';
        $method->save();

        $notify_message= trans('translate.Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-methods.index')->with($notify_message);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request ,$id)
    {

        $method =  WithdrawMethod::findOrFail($id);

        return view('paymentwithdraw::method.edit', ['method' => $method]);

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(WithdrawMethodRequest $request, $id)
    {
        $method =  WithdrawMethod::findOrFail($id);
        $method->method_name = $request->method_name;
        $method->max_amount = $request->max_amount;
        $method->min_amount = $request->min_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = $request->status ? 'enable' : 'disable';
        $method->save();

        $notify_message= trans('translate.Updated Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-methods.index')->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $exist_withdraw = SellerWithdraw::where('withdraw_method_id', $id)->count();

        if($exist_withdraw > 0){
            $notify_message = trans('translate.Multiple withdraw created under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $method =  WithdrawMethod::findOrFail($id);
        $method->delete();

        $notify_message= trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-methods.index')->with($notify_message);
    }


}
