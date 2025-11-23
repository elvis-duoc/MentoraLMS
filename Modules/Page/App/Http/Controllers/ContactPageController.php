<?php

namespace Modules\Page\App\Http\Controllers;

use Image, File, Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\ContactUs;

class ContactPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $contact_us = ContactUs::first();

        return view('page::contact_us', compact('contact_us'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'compus_one' => 'nullable|max:255',
            'compus_two' => 'nullable|max:255',
            'address_2' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'email' => 'nullable|max:255',
            'email2' => 'nullable|max:255',
            'phone' => 'nullable|max:255',
            'phone2' => 'nullable|max:255',
        ]);

        $contact_us = ContactUs::first();
        $contact_us->compus_one = $request->compus_one;
        $contact_us->compus_two = $request->compus_two;
        $contact_us->address_2 = $request->address_2;
        $contact_us->address = $request->address;
        $contact_us->email = $request->email;
        $contact_us->email2 = $request->email2;
        $contact_us->phone = $request->phone;
        $contact_us->phone2 = $request->phone2;
        $contact_us->map_code = $request->map_code;
        $contact_us->save();

        if($request->image){
            $old_image = $contact_us->image;
            $image_name = 'contact-image-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $contact_us->image = $image_name;
            $contact_us->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('translate.Updated Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

}
