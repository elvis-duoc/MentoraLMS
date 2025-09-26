<?php

namespace Modules\CertificateBuilder\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Modules\CertificateBuilder\App\Models\CertificateSetting;

class CertificateBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificate = CertificateSetting::get();

        $certificate_setting = array();

        foreach($certificate as $data_item){
            $certificate_setting[$data_item->key] = $data_item->value;
        }

        $certificate_setting = (object) $certificate_setting;

        return view('certificatebuilder::index', [
            'certificate_setting' => $certificate_setting
        ]);
    }


    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'position_x' => 'required',
            'position_y' => 'required',
        ]);

        CertificateSetting::where('key', $request->name.'_x')->update(['value' => $request->position_x]);
        CertificateSetting::where('key', $request->name.'_y')->update(['value' => $request->position_y]);

        return response()->json(['message' => trans('translate.Updated successful')]);

    }


    public function update_setting(Request $request){

        CertificateSetting::where('key', 'student_name')->update(['value' => $request->student_name]);
        CertificateSetting::where('key', 'course_name')->update(['value' => $request->course_name]);


        $certificate_bg_setting = CertificateSetting::where('key', 'certificate_bg')->first();

        if($request->certificate_bg){
            $old_logo = $certificate_bg_setting->value;
            $image = $request->certificate_bg;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'certificate_bg-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            Image::make($image)
                ->save(public_path().'/'.$logo_name);
            $certificate_bg_setting->value = $logo_name;
            $certificate_bg_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        $signature_setting = CertificateSetting::where('key', 'signature')->first();

        if($request->signature){
            $old_logo = $signature_setting->value;
            $image = $request->signature;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'signature-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            Image::make($image)
                ->save(public_path().'/'.$logo_name);
            $signature_setting->value = $logo_name;
            $signature_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }





        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

}
