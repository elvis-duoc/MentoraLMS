<?php

namespace Modules\Page\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\CustomPage;
use Modules\Language\App\Models\Language;
use Modules\Page\App\Models\CustomPageTranslation;
use Modules\Page\App\Http\Requests\CustomPageRequest;

class CustomPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custom_pages = CustomPage::latest()->get();

        return view('page::custom_page.index', [
            'custom_pages' => $custom_pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page::custom_page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomPageRequest $request)
    {
        $custom_page = new CustomPage();
        $custom_page->slug = $request->slug;
        $custom_page->status = $request->status ? 1 : 0;
        $custom_page->save();

        $languages = Language::all();

        foreach($languages as $language){
            $custom_trans = new CustomPageTranslation();
            $custom_trans->lang_code = $language->lang_code;
            $custom_trans->custom_page_id = $custom_page->id;
            $custom_trans->page_name = $request->page_name;
            $custom_trans->description = $request->description;
            $custom_trans->save();
        }

        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.custom-page.edit', ['custom_page' => $custom_page->id, 'lang_code' => admin_lang()])->with($notify_message);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $custom_page = CustomPage::findOrFail($id);

        $translate = CustomPageTranslation::where(['custom_page_id' => $custom_page->id, 'lang_code' => $request->lang_code])->first();

        return view('page::custom_page.edit', [
            'custom_page' => $custom_page,
            'translate' => $translate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomPageRequest $request, $id)
    {
        $custom_page = CustomPage::findOrFail($id);

        if($request->lang_code == admin_lang()){
            $custom_page->slug = $request->slug;
            $custom_page->status = $request->status ? 1 : 0;
            $custom_page->save();
        }

        $translate = CustomPageTranslation::where(['custom_page_id' => $custom_page->id, 'lang_code' => $request->lang_code])->first();
        $translate->page_name = $request->page_name;
        $translate->description = $request->description;
        $translate->save();

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $custom_page = CustomPage::findOrFail($id);
        $custom_page->delete();

        CustomPageTranslation::where('custom_page_id', $id)->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }


    public function setup_language($lang_code){
        $page_translates = CustomPageTranslation::where('lang_code' , admin_lang())->get();

        foreach($page_translates as $page_translate){
            $new_trans = new CustomPageTranslation();
            $new_trans->lang_code = $lang_code;
            $new_trans->custom_page_id = $page_translate->custom_page_id;
            $new_trans->page_name = $page_translate->page_name;
            $new_trans->description = $page_translate->description;
            $new_trans->save();

        }
    }
}
