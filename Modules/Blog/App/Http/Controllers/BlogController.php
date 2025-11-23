<?php

namespace Modules\Blog\App\Http\Controllers;

use Auth;
use Image, File, Str;
use Illuminate\Http\Request;
use Modules\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Modules\Blog\App\Models\BlogComment;
use Modules\Blog\App\Models\BlogCategory;
use Modules\Language\App\Models\Language;
use Modules\Blog\App\Models\BlogTranslation;
use Modules\Blog\App\Http\Requests\BlogRequest;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('blog::blog_list', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog_categories = BlogCategory::with('translate')->get();

        return view('blog::blog_create', ['blog_categories' => $blog_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $auth_admin = Auth::guard('admin')->user();

        $blog = new Blog();

        if($request->image){
            $image_name = 'blog-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $blog->image = $image_name;
        }

        $blog->blog_category_id = $request->category;
        $blog->slug = $request->slug;
        $blog->admin_id = $auth_admin->id;
        $blog->is_popular = $request->is_popular ? 1 : 0;
        $blog->status = $request->status ? 1 : 0;
        $blog->tags = $request->tags;
        $blog->save();

        $languages = Language::all();
        foreach($languages as $language){
            $blog_trans = new BlogTranslation();
            $blog_trans->lang_code = $language->lang_code;
            $blog_trans->blog_id = $blog->id;
            $blog_trans->title = $request->title;
            $blog_trans->description = $request->description;
            $blog_trans->short_description = $request->short_description;
            $blog_trans->seo_title = $request->seo_title ? $request->seo_title : $request->title;
            $blog_trans->seo_description = $request->seo_description ? $request->seo_description : $request->title;
            $blog_trans->save();

        }


        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.blog.edit', ['blog' => $blog->id, 'lang_code' => admin_lang()])->with($notify_message);


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog_translate = BlogTranslation::where(['blog_id' => $id, 'lang_code' => $request->lang_code])->first();

        $blog_categories = BlogCategory::with('translate')->get();

        return view('blog::blog_edit', ['blog' => $blog, 'blog_categories' => $blog_categories, 'blog_translate' => $blog_translate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);

        if($request->image){
            $old_image = $blog->image;
            $image_name = 'blog-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $blog->image = $image_name;
            $blog->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->lang_code == admin_lang()){
            $blog->blog_category_id = $request->category;
            $blog->slug = $request->slug;
            $blog->is_popular = $request->is_popular ? 1 : 0;
            $blog->status = $request->status ? 1 : 0;
            $blog->tags = $request->tags;
            $blog->save();
        }

        $blog_trans = BlogTranslation::where(['id' => $request->translate_id])->first();
        $blog_trans->title = $request->title;
        $blog_trans->description = $request->description;
        $blog_trans->short_description = $request->short_description;
        $blog_trans->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $blog_trans->seo_description = $request->seo_description ? $request->seo_description : $request->title;
        $blog_trans->save();


        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $blog = Blog::findOrFail($id);

        $old_image = $blog->image;
        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        BlogComment::where('blog_id', $id)->delete();
        BlogTranslation::where('blog_id', $id)->delete();

        $blog->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.blog.index')->with($notify_message);
    }

    public function blog_list(){

        $blog_comments = BlogComment::with('blog')->latest()->get();

        return view('blog::blog_comment', ['blog_comments' => $blog_comments]);
    }

    public function show_comment($id){

        $blog_comment = BlogComment::with('blog')->findOrFail($id);

        return view('blog::blog_comment_show', ['blog_comment' => $blog_comment]);
    }

    public function delete_comment($id){

        $blog_comment = BlogComment::with('blog')->findOrFail($id);
        $blog_comment->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.comment-list')->with($notify_message);
    }



    public function blog_comment_status($id){

        $blog_comment = BlogComment::findOrFail($id);
        if($blog_comment->status == 1){
            $blog_comment->status = 0;
            $blog_comment->save();
        }else{
            $blog_comment->status = 1;
            $blog_comment->save();
        }

        $notify_message = trans('translate.Updated successfully');
        return response()->json($notify_message);
    }


    public function setup_language($lang_code){
        $blog_translates = BlogTranslation::where('lang_code' , admin_lang())->get();

        foreach($blog_translates as $blog_translate){
            $new_trans = new BlogTranslation();
            $new_trans->lang_code = $lang_code;
            $new_trans->title = $blog_translate->title;
            $new_trans->blog_id = $blog_translate->blog_id;
            $new_trans->description = $blog_translate->description;
            $new_trans->short_description = $blog_translate->short_description;
            $new_trans->seo_title = $blog_translate->seo_title;
            $new_trans->seo_description = $blog_translate->seo_description;
            $new_trans->save();

        }
    }


}
