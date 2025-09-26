<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Modules\Currency\App\Models\Currency;
use Modules\Language\App\Models\Language;
use Symfony\Component\HttpFoundation\Response;


class CurrencyLangauge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::get('front_lang')){
            $default_lang = Language::where('is_default','Yes')->first();
            if($default_lang){
                Session::put('front_lang', $default_lang->lang_code);
                Session::put('lang_dir', $default_lang->lang_direction);
                Session::put('front_lang_name', $default_lang->lang_name);
            }else{
                $default_lang = Language::where('id', 1)->first();
                Session::put('front_lang', $default_lang->lang_code);
                Session::put('lang_dir', $default_lang->lang_direction);
                Session::put('front_lang_name', $default_lang->lang_name);
            }

            app()->setLocale($default_lang->lang_code);
        }else{
            $is_exist = Language::where('lang_code', Session::get('front_lang'))->first();
            if(!$is_exist){
                Session::put('front_lang', 'en');
                Session::put('lang_dir', 'left_to_right');
                Session::put('front_lang_name', 'English');
            }

            app()->setLocale(Session::get('front_lang'));
        }

        // for currency
        if(!Session::get('currency_code')){
            $default_currency = Currency::where('is_default','yes')->first();
            if($default_currency){
                Session::put('currency_name', $default_currency->currency_name);
                Session::put('currency_code', $default_currency->currency_code);
                Session::put('currency_icon', $default_currency->currency_icon);
                Session::put('currency_rate', $default_currency->currency_rate);
                Session::put('currency_position', $default_currency->currency_position);
            }else{
                $default_currency = Currency::where('id', 1)->first();
                Session::put('currency_name', $default_currency->currency_name);
                Session::put('currency_code', $default_currency->currency_code);
                Session::put('currency_icon', $default_currency->currency_icon);
                Session::put('currency_rate', $default_currency->currency_rate);
                Session::put('currency_position', $default_currency->currency_position);
            }

        }else{
            $session_currency = Currency::where('currency_code', Session::get('currency_code'))->first();
            if(!$session_currency){
                $default_currency = Currency::where('id', 1)->first();

                Session::put('currency_name', $default_currency->currency_name);
                Session::put('currency_code', $default_currency->currency_code);
                Session::put('currency_icon', $default_currency->currency_icon);
                Session::put('currency_rate', $default_currency->currency_rate);
                Session::put('currency_position', $default_currency->currency_position);
            }
        }

        app()->setLocale(Session::get('front_lang'));

        return $next($request);
    }
}
