<?php

namespace Modules\SeoSetting\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\SeoSetting\App\Models\SeoSetting;
use Modules\SeoSetting\App\Http\Requests\SeoSettingRequest;

class SeoSettingController extends Controller
{

    public function index()
    {
        $seo_setting = SeoSetting::all();

        return view('seosetting::seo_setting', ['seo_setting' => $seo_setting]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SeoSettingRequest $request, $id)
    {
        $seo_setting = SeoSetting::findOrFail($id);
        $seo_setting->seo_title = $request->seo_title;
        $seo_setting->seo_description = $request->seo_description;
        $seo_setting->save();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


}
