<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        $school = new School();
        $school->name = $request->name;
        $school->slug = $request->slug ?: Str::slug($request->name);
        $school->primary_color = $request->primary_color;
        $school->secondary_color = $request->secondary_color;
        $school->status = $request->status;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();

            $uploadPath = public_path('uploads/schools/');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $logo->move($uploadPath, $logoName);
            $school->logo = $logoName;
        }

        $school->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');

        return redirect()->route('admin.schools.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        $students = $school->students()->orderBy('created_at', 'desc')->paginate(10, ['*'], 'students_page');
        $instructors = $school->instructors()->orderBy('created_at', 'desc')->paginate(10, ['*'], 'instructors_page');

        return view('admin.school.show', compact('school', 'students', 'instructors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('admin.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, School $school)
    {
        $school->name = $request->name;
        $school->slug = $request->slug ?: Str::slug($request->name);
        $school->primary_color = $request->primary_color;
        $school->secondary_color = $request->secondary_color;
        $school->status = $request->status;

        if ($request->hasFile('logo')) {
            $oldLogo = $school->logo;

            $logo = $request->file('logo');
            $logoName = time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();

            $uploadPath = public_path('uploads/schools/');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $logo->move($uploadPath, $logoName);
            $school->logo = $logoName;

            if ($oldLogo && File::exists(public_path('uploads/schools/' . $oldLogo))) {
                File::delete(public_path('uploads/schools/' . $oldLogo));
            }
        }

        $school->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');

        return redirect()->route('admin.schools.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        if ($school->users()->count() > 0) {
            $notification = trans('admin_validation.This school has associated users and cannot be deleted');
            $notification = array('messege' => $notification, 'alert-type' => 'error');

            return redirect()->back()->with($notification);
        }

        if ($school->logo && File::exists(public_path('uploads/schools/' . $school->logo))) {
            File::delete(public_path('uploads/schools/' . $school->logo));
        }

        $school->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');

        return redirect()->route('admin.schools.index')->with($notification);
    }

    /**
     * Update school status
     */
    public function school_status(Request $request, $id)
    {
        $school = School::findOrFail($id);
        $school->status = $request->status;
        $school->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');

        return response()->json(['notification' => $notification]);
    }
}