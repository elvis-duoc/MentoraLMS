<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Route;

class DemoMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Route::is('student.store-login') || Route::is('student.logout') || Route::is('admin.store-login') || Route::is('admin.logout')){
            return $next($request);
         }else{

            if(env('APP_MODE') == 'DEMO'){

                if($request->isMethod('post') || $request->isMethod('delete') || $request->isMethod('put') || $request->isMethod('patch')){

                    if ($request->ajax()) {
                        return response()->json(['message' => 'This Is Demo Version. You Can Not Change Anything'],403);
                    } else {

                        $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
                        $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
                        return redirect()->back()->with($notify_message);
                    }
                }
            }
         }

        return $next($request);

    }
}
