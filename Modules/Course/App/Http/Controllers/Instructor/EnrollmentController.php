<?php

namespace Modules\Course\App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;


class EnrollmentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('web')->user();

        $enrollments = CourseEnrollmentList::with('course_enrollment.student')->where('instructor_id', $user->id)->latest()->get();

        $title = trans('translate.My Revenue');

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

        return view('course::instructor.enrollment.index', [
            'enrollments' => $enrollments,
            'title' => $title,
            'total_income' => $total_income,
            'total_commission' => $total_commission,
            'net_income' => $net_income,
            'current_balance' => $current_balance,
            'total_withdraw_amount' => $total_withdraw_amount,
            'pending_withdraw' => $pending_withdraw,
        ]);
    }

}
