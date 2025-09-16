<?php

namespace Modules\Page\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\PrivacyPolicy;
use Modules\Page\App\Http\Requests\PrivacyPolicyRequest;

class PrivacyController extends Controller
{

    public function index(Request $request)
    {
        $privacy_policy = PrivacyPolicy::where('lang_code', $request->lang_code)->first();

        return view('page::privacy_policy', ['privacy_policy' => $privacy_policy]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrivacyPolicyRequest $request)
    {
        $privacy_policy = PrivacyPolicy::where('id', $request->translate_id)->first();
        $privacy_policy->description = $request->description;
        $privacy_policy->save();

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function setup_language($lang_code){
        $privacy_translates = PrivacyPolicy::where('lang_code' , admin_lang())->first();

        $new_trans = new PrivacyPolicy();
        $new_trans->lang_code = $lang_code;
        $new_trans->description = $privacy_translates->description;
        $new_trans->save();

    }
}
