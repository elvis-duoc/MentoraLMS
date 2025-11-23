<?php

namespace Modules\PaymentWithdraw\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;

class PaymentWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $withdraw_list = SellerWithdraw::latest()->get();

        return view('paymentwithdraw::index', [
            'withdraw_list' => $withdraw_list
        ]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {

        $withdraw = SellerWithdraw::findOrFail($id);

        return view('paymentwithdraw::show', [
            'withdraw' => $withdraw
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function withdraw_approval($id)
    {

        $withdraw = SellerWithdraw::findOrFail($id);
        $withdraw->status = 'approved';
        $withdraw->save();


        $notify_message= trans('translate.Withdraw approved successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function withdraw_rejected($id)
    {

        $withdraw = SellerWithdraw::findOrFail($id);
        $withdraw->status = 'rejected';
        $withdraw->save();

        $notify_message= trans('translate.Withdraw rejected successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $withdraw = SellerWithdraw::findOrFail($id);
        $withdraw->delete();


        $notify_message= trans('translate.Withdraw deleted successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-list.index')->with($notify_message);
    }
}
