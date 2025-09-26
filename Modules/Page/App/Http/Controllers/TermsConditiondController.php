<?php

namespace Modules\Page\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\TermAndCondition;
use Modules\Page\App\Http\Requests\TermsConditionRequest;

class TermsConditiondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $terms_conditions = TermAndCondition::where('lang_code', $request->lang_code)->first();

        return view('page::terms_conditions', ['terms_conditions' => $terms_conditions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TermsConditionRequest $request)
    {
        $terms_conditions = TermAndCondition::where('id', $request->translate_id)->first();
        $terms_conditions->description = $request->description;
        $terms_conditions->save();

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function setup_language($lang_code){
        $terms_conditions = TermAndCondition::where('lang_code' , admin_lang())->first();

        $new_trans = new TermAndCondition();
        $new_trans->lang_code = $lang_code;
        $new_trans->description = $terms_conditions->description;
        $new_trans->save();

    }

}
