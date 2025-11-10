<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class DashboardController extends Controller
{
    public function dashboard(){

        $enrollments_report = CourseEnrollment::where('payment_status', 'success')->get();

        $total_income = $enrollments_report->sum('total_amount');

        $total_sold = CourseEnrollmentList::whereHas('course_enrollment', function($query) {
            $query->where('payment_status', 'success');
        })->count();

        $commission_type = GlobalSetting::where('key', 'commission_type')->value('value');
        $commission_per_sale = GlobalSetting::where('key', 'commission_per_sale')->value('value');

        $total_commission = 0.00;
        $net_income = $total_income;
        if($commission_type == 'commission'){
            $total_commission = ($commission_per_sale / 100) * $total_income;
            $net_income = $total_income - $total_commission;
        }

        $lable = array();
        $data = array();
        $start = new Carbon('first day of this month');
        $last = new Carbon('last day of this month');
        $first_date = $start->format('Y-m-d');
        $last_date = $last->format('Y-m-d');
        $today = date('Y-m-d');
        $length = date('d')-$start->format('d');

        for($i=1; $i <= $length+1; $i++){

            $date = '';
            if($i == 1){
                $date = $first_date;
            }else{
                $date = $start->addDays(1)->format('Y-m-d');
            };

            $sum = CourseEnrollment::whereDate('created_at', $date)->sum('total_amount');
            $data[] = $sum;
            $lable[] = $i;

        }

        $data = json_encode($data);
        $lable = json_encode($lable);



        $enrollments = CourseEnrollment::with('student', 'course_list')->latest()->take(10)->get();

        return view('admin.dashboard', [
            'lable' => $lable,
            'data' => $data,
            'enrollments' => $enrollments,
            'total_income' => $total_income,
            'total_commission' => $total_commission,
            'net_income' => $net_income,
            'total_sold' => $total_sold,
        ]);
    }
}
