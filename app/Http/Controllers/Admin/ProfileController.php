<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth, Str, Image, File, Hash;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\PasswordChangeRequest;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function edit_profile(){

        $admin = Auth::guard('admin')->user();

        return view('admin.edit_profile', ['admin' => $admin]);
    }


    public function profile_update(EditProfileRequest $request){

        $admin = Auth::guard('admin')->user();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->designation = $request->designation;
        $admin->facebook = $request->facebook;
        $admin->linkedin = $request->linkedin;
        $admin->twitter = $request->twitter;
        $admin->instagram = $request->instagram;
        $admin->about_me = $request->about_me;
        $admin->save();


        if($request->hasFile('image')){
            $old_image = $admin->image;
            $user_image = $request->image;
            $extention = $user_image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/website-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path($image_name));

            $admin->image = $image_name;
            $admin->save();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function update_password(PasswordChangeRequest $request){

        $admin = Auth::guard('admin')->user();

        if(Hash::check($request->current_password, $admin->password)){
            $admin->password = Hash::make($request->password);
            $admin->save();

            $notify_message = trans('translate.Password changed successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = trans('translate.Current password does not match');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }


    }





}
