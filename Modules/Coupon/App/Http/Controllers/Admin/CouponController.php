<?php

namespace Modules\Coupon\App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Coupon\App\Models\Coupon;
use Modules\Coupon\App\Models\CouponHistory;
use Modules\Coupon\App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::where(['seller_id' => 0])->orderBy('id', 'desc')->get();

        return view('coupon::index', [
            'coupons' => $coupons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupon::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $coupon = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->offer_percentage = $request->offer_percentage;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status ? 'enable' : 'disable';
        $coupon->save();

        $notify_message= trans('translate.Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.coupon.index')->with($notify_message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('coupon::edit', [
            'coupon' => $coupon
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, $id)
    {

        $coupon = Coupon::findOrFail($id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->offer_percentage = $request->offer_percentage;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status ? 'enable' : 'disable';
        $coupon->save();

        $notify_message= trans('translate.Updated Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        $notify_message= trans('translate.Deleted Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function coupon_log(){

        $coupon_logs = CouponHistory::with('buyer', 'coupon')->latest()->get();

        return view('coupon::coupon_log', [
            'coupon_logs' => $coupon_logs
        ]);
    }
}
