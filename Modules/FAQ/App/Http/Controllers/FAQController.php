<?php

namespace Modules\FAQ\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\FAQ\App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Language\App\Models\Language;
use Modules\FAQ\App\Models\FaqTranslation;
use Modules\FAQ\App\Http\Requests\FaqRequest;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::with('translate')->get();

        return view('faq::index', ['faqs' => $faqs]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $faq = new Faq();
        $faq->faq_type = $request->faq_type;
        $faq->save();

        $languages = Language::all();

        foreach($languages as $language){
            $faq_trans = new FaqTranslation();
            $faq_trans->lang_code = $language->lang_code;
            $faq_trans->faq_id = $faq->id;
            $faq_trans->answer = $request->answer;
            $faq_trans->question = $request->question;
            $faq_trans->save();
        }


        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.faq.edit', ['faq' => $faq->id, 'lang_code' => admin_lang()])->with($notify_message);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,$id)
    {
        $faq = Faq::findOrFail($id);
        $translate = FaqTranslation::where(['lang_code' => $request->lang_code, 'faq_id' => $id])->first();

        return view('faq::edit', ['faq' => $faq, 'translate' => $translate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->faq_type = $request->faq_type;
        $faq->save();

        $faq_trans = FaqTranslation::where('id', $request->translate_id)->first();
        $faq_trans->answer = $request->answer;
        $faq_trans->question = $request->question;
        $faq_trans->save();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        FaqTranslation::where('faq_id', $id)->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }


    public function setup_language($lang_code){
        $faq_translates = FaqTranslation::where('lang_code' , admin_lang())->get();

        foreach($faq_translates as $faq_translate){
            $new_trans = new FaqTranslation();
            $new_trans->lang_code = $lang_code;
            $new_trans->answer = $faq_translate->answer;
            $new_trans->question = $faq_translate->question;
            $new_trans->faq_id = $faq_translate->faq_id;
            $new_trans->save();

        }
    }
}
