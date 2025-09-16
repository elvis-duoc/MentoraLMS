<?php

namespace Modules\Testimonial\App\Http\Controllers;

use Image, File, Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Language\App\Models\Language;
use Modules\Testimonial\App\Models\Testimonial;
use Modules\Testimonial\App\Models\TestimonialTrasnlation;
use Modules\Testimonial\App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::with('translate')->latest()->get();

        return view('testimonial::index', ['testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonial::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial = new Testimonial();

        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Ymdhis').'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
            $testimonial->image = $image_name;
        }

        $testimonial->status = $request->status ? 'active' : 'inactive';
        $testimonial->rating = $request->rating;
        $testimonial->save();

        $languages = Language::all();

        foreach($languages as $language){

            $testimonial_trans = new TestimonialTrasnlation();
            $testimonial_trans->lang_code = $language->lang_code;
            $testimonial_trans->testimonial_id = $testimonial->id;
            $testimonial_trans->name = $request->name;
            $testimonial_trans->designation = $request->designation;
            $testimonial_trans->comment = $request->comment;
            $testimonial_trans->save();
        }


        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.testimonial.edit', ['testimonial' => $testimonial->id, 'lang_code' => admin_lang()])->with($notify_message);

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $translate = TestimonialTrasnlation::where(['lang_code' => $request->lang_code, 'testimonial_id' => $id])->first();

        return view('testimonial::edit', ['testimonial' => $testimonial, 'translate' => $translate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if($request->lang_code == admin_lang()){
            if($request->image){
                $existing_file = $testimonial->image;
                $extention = $request->image->getClientOriginalExtension();
                $image_name = Str::slug($request->name).date('-Ymdhis').'.'.$extention;
                $image_name = 'uploads/custom-images/'.$image_name;
                Image::make($request->image)
                    ->save(public_path().'/'.$image_name);
                $testimonial->image = $image_name;
                $testimonial->save();

                if(File::exists(public_path().'/'.$existing_file)){
                    unlink(public_path().'/'.$existing_file);
                };
            }

            $testimonial->status = $request->status ? 'active' : 'inactive';
            $testimonial->rating = $request->rating;
            $testimonial->save();
        }

        $testimonial_trans = TestimonialTrasnlation::findOrFail($request->translate_id);
        $testimonial_trans->name = $request->name;
        $testimonial_trans->designation = $request->designation;
        $testimonial_trans->comment = $request->comment;
        $testimonial_trans->save();



        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $existing_file = $testimonial->image;

        $testimonial->delete();

        TestimonialTrasnlation::where('testimonial_id', $id)->delete();

        if(File::exists(public_path().'/'.$existing_file)){
            unlink(public_path().'/'.$existing_file);
        };

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function setup_language($lang_code){
        $testimonial_trans = TestimonialTrasnlation::where('lang_code' , admin_lang())->get();

        foreach($testimonial_trans as $testimonial_tran){
            $new_trans = new TestimonialTrasnlation();
            $new_trans->lang_code = $lang_code;
            $new_trans->name = $testimonial_tran->name;
            $new_trans->designation = $testimonial_tran->designation;
            $new_trans->comment = $testimonial_tran->comment;
            $new_trans->testimonial_id = $testimonial_tran->testimonial_id;
            $new_trans->save();

        }
    }
}
