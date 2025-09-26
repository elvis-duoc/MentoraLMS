<?php

namespace App\Providers;

use View;
use Cache;
use Exception;
use Illuminate\Support\Facades\Log;
use Modules\Page\App\Models\Footer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Entities\Category;
use Modules\Page\App\Models\CustomPage;
use Modules\Blog\App\Models\BlogCategory;
use Modules\Currency\App\Models\Currency;
use Modules\Language\App\Models\Language;
use Modules\Wishlist\App\Models\Wishlist;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        try{
            $setting = Cache::rememberForever('setting', function(){
                $setting_data = GlobalSetting::get();

                $setting = array();

                foreach($setting_data as $data_item){
                    $setting[$data_item->key] = $data_item->value;
                }

                $setting = (object) $setting;

                return $setting;
            });


            $timezone_setting = Cache::get('setting');

            config(['app.timezone' => $timezone_setting->timezone ?? 'UTC']);
            date_default_timezone_set($timezone_setting->timezone ?? 'UTC');

            View::composer('*', function($view){

                $general_setting = Cache::get('setting');

                $language_list = Language::where('status', 1)->get();
                $currency_list = Currency::where('status', 'active')->get();
                $custom_pages = CustomPage::where('status', 1)->get();

                $menu_categories = Category::where('status', 'enable')->latest()->get();
                $footer_blog_categories = BlogCategory::where('status', 1)->latest()->take(7)->get();

                $footer = Footer::first();

                $wishlist_array = [];

                if (Auth::guard('web')->check()) {
                    $user_d = Auth::guard('web')->id();

                    $wishlist_arrays = Wishlist::where('user_id', $user_d)->pluck('item_id');

                    foreach($wishlist_arrays as $wishlist_item){
                        $wishlist_array[] = $wishlist_item;
                    }
                }

                $view->with('general_setting', $general_setting);
                $view->with('language_list', $language_list);
                $view->with('currency_list', $currency_list);
                $view->with('footer', $footer);
                $view->with('custom_pages', $custom_pages);
                $view->with('menu_categories', $menu_categories);
                $view->with('footer_blog_categories', $footer_blog_categories);
                $view->with('wishlist_array', $wishlist_array);

            });

        }catch(Exception $ex){
            Log::info('AppServiceProvider : '. $ex->getMessage());

            Artisan::call('optimize:clear');
        }






    }
}
