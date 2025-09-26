<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $auth_user = Auth::guard('web')->user();

        if($auth_user->is_seller == 1){
            return $next($request);
        }else{
            $notify_message = trans('translate.Unable to access instructor dashboard');
            $notify_message = array('message' => $notify_message,'alert-type' => 'error');
            return redirect()->route('student.dashboard')->with($notify_message);
        }

        return $next($request);
    }
}
