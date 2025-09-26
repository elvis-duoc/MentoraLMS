<?php

namespace Modules\Partner\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Modules\Partner\App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();

        return view('partner::index',compact('partners'));
    }

    public function create()
    {
        return view('partner::create');
    }


    public function store(Request $request)
    {
        $rules = [
            'logo' => 'required'
        ];
        $customMessages = [
            'logo.required' => trans('translate.Logo is required')
        ];
        $request->validate($rules,$customMessages);

        $partner = new Partner();
        if($request->logo){
            $extention = $request->logo->getClientOriginalExtension();
            $logo_name = 'our-partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->logo->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->logo=$logo_name;
        }
        $partner->link = $request->link;
        $partner->save();

        $notification = trans('translate.Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }


    public function edit($id)
    {
        $partner = Partner::findOrFail($id);

        return view('partner::edit',compact('partner'));
    }


    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);

        if($request->logo){
            $old_logo = $partner->logo;
            $extention = $request->logo->getClientOriginalExtension();
            $logo_name = 'Partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;

            $request->logo->move(public_path('uploads/custom-images/'),$logo_name);

            $partner->logo = $logo_name;
            $partner->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        $partner->link = $request->link;
        $partner->save();

        $notification = trans('translate.admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }


    public function destroy($id)
    {
        $partner = Partner::find($id);
        $old_logo = $partner->logo;
        $partner->delete();
        if($old_logo){
            if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
        }

        $notification = trans('translate.admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }

}
