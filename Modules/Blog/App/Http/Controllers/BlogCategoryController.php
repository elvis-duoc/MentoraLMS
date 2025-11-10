<?php

namespace Modules\Blog\App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Modules\Blog\App\Models\BlogCategory;
use Modules\Language\App\Models\Language;
use Modules\Blog\App\Models\BlogCategoryTranslation;
use Modules\Blog\App\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blog_categories = BlogCategory::with('translate')->latest()->get();

        return view('blog::blog_category', ['blog_categories' => $blog_categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog::blog_category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request)
    {
        $blog_category = new BlogCategory();
        $blog_category->slug = $request->slug;
        $blog_category->status = $request->status ? 1 : 0;
        $blog_category->save();

        $languages = Language::all();
        foreach($languages as $language){
            $category_trans = new BlogCategoryTranslation();
            $category_trans->lang_code = $language->lang_code;
            $category_trans->blog_category_id = $blog_category->id;
            $category_trans->name = $request->name;
            $category_trans->save();

        }

        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.blog-category.edit', ['blog_category' => $blog_category->id, 'lang_code' => admin_lang()])->with($notify_message);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $blog_category = BlogCategory::findOrFail($id);

        $cat_translate = BlogCategoryTranslation::where(['blog_category_id' => $blog_category->id, 'lang_code' => $request->lang_code])->first();

        return view('blog::blog_category_edit', ['blog_category' => $blog_category, 'cat_translate' => $cat_translate]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, $id)
    {
        $blog_category = BlogCategory::findOrFail($id);

        if($request->lang_code == admin_lang()){
            $blog_category->slug = $request->slug;
            $blog_category->status = $request->status ? 1 : 0;
            $blog_category->save();
        }

        $cat_translate = BlogCategoryTranslation::where(['id' => $request->translate_id])->first();
        $cat_translate->name = $request->name;
        $cat_translate->save();

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog_exist = Blog::where('blog_category_id', $id)->count();

        if($blog_exist > 0){
            $notify_message = trans('translate.You can not delete it, multiple blog available on this category');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->delete();

        BlogCategoryTranslation::where('blog_category_id', $id)->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function setup_language($lang_code){
        $cat_translates = BlogCategoryTranslation::where('lang_code' , admin_lang())->get();

        foreach($cat_translates as $cat_translate){
            $new_trans = new BlogCategoryTranslation();
            $new_trans->lang_code = $lang_code;
            $new_trans->name = $cat_translate->name;
            $new_trans->blog_category_id = $cat_translate->blog_category_id;
            $new_trans->save();

        }
    }
}
