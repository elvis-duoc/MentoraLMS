<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $maintenance_status = GlobalSetting::where('key', 'maintenance_status')->first();

        if($maintenance_status->value == 1){
            return response()->view('maintenance');
        }

        return $next($request);

    }
}
