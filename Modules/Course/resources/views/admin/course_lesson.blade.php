@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Lesson List') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Lesson List') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Course') }} >> {{ __('translate.Lesson List') }}</p>
@endsection

@section('body-content')


<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row row__bscreen">
            <div class="col-12">
                <div class="crancy-body">

                    <div class="crancy-psidebar edc-edit-course-sidebar">
                        <!-- Features Tab List -->
                        @include('course::admin.course_sidebar')

                    </div>

                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="crancy-personals mg-top-30">

                            <div class="crancy-ptabs edc-edit-course-body">

                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Module') }} : {{ html_decode($course_module->name) }}</h4>

                                            <a  href="javascript:;" data-bs-toggle="modal" data-bs-target="#curriculumAdd" class="crancy-btn ">
                                            <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                            </span>
                                            {{ __('translate.Add Lesson') }}</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3  no-footer">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Visibility') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Status') }}
                                                </th>


                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('translate.Action') }}
                                                </th>

                                            </tr>
                                        </thead>

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @foreach ($module_lessons as $index => $module_lesson)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $module_lesson->serial }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($module_lesson?->name) }} </h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        @if ($module_lesson->is_public_lesson == 'enable')
                                                            <span class="badge bg-success">{{ __('translate.Public') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('translate.Private') }}</span>
                                                        @endif

                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($module_lesson->status == 'enable')
                                                            <span class="badge bg-success">{{ __('translate.Active') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('translate.In-active') }}</span>
                                                        @endif
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#curriculumEdit{{ $module_lesson->id }}" class="crancy-btn"><i class="fas fa-edit"></i> {{ __('translate.Edit') }}</a>

                                                        <a onclick="itemDeleteConfrimation({{ $course_module->id }}, {{ $module_lesson->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i> </a>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>
                                </div>
                                <!-- End crancy Table -->
                                <div class="d-flex justify-content-end">
                                    <div>
                                        @if (request()->has('req_type') && request()->get('req_type') == 'from_create')

                                            <a class="crancy-btn next-btn mg-top-25" href="{{ route('admin.course-curriculum', ['course_id' => $course->id, 'req_type' => 'from_create'] ) }}">  {{ __('translate.Previous') }}</a>

                                            <a class="crancy-btn edc-crs-step-save-btn next-btn mg-top-25" href="{{ route('admin.course-seo', ['course_id' => $course->id, 'req_type' => 'from_create']) }}">  {{ __('translate.Next') }}</a>

                                        @else

                                            <a class="crancy-btn next-btn mg-top-25" href="{{ route('admin.course-curriculum', $course->id ) }}"> {{ __('translate.Previous') }}</a>

                                            <a class="crancy-btn edc-crs-step-save-btn next-btn mg-top-25" href="{{ route('admin.course-seo', $course->id ) }}">  {{ __('translate.Next') }} </a>

                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- End Dashboard Inner -->




                </div>
            </div>
        </div>
    </div>
</section>



<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModalId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Delete Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('translate.Are you realy want to delete this item?') }}</p>
            </div>
            <div class="modal-footer">
                <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Delete') }}</button>

                </form>
            </div>
        </div>
    </div>
</div>

  <!-- Edit curriculum modal -->
@foreach ($module_lessons as $index => $module_lesson)
    <div class="modal fade" id="curriculumEdit{{ $module_lesson->id }}" tabindex="-1" aria-labelledby="curriculumEdit{{ $module_lesson->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content delet_modal_form" method="POST" action="{{ route('admin.update-course-lesson', ['course_module_id' => $course_module->id, 'module_lesson_id' => $module_lesson->id]) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="curriculumEdit{{ $module_lesson->id }}">{{ __('translate.Edit Lesson') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">


                        @if ($module_lesson->video_id)
                            <div class="col-md-12">
                                <div class="crancy__item-form--group">
                                    <label class="crancy__item-label">{{ __('translate.Video Preview') }} </label>

                                    <iframe width="500" height="345" src="{{ html_decode($module_lesson->video_id) }}">
                                    </iframe>

                                </div>
                            </div>
                        @endif

                        <div class="col-md-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Video Source') }} * </label>
                                <select class="form-select crancy__item-input" name="video_source">
                                    <option {{ $module_lesson->video_source == 'youtube' ? 'selected' : '' }} value="youtube">{{ __('translate.Youtube') }}</option>
                                    <option {{ $module_lesson->video_source == 'vimeo' ? 'selected' : '' }} value="vimeo">{{ __('translate.Vimeo') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Video Link') }} * </label>
                                <input class="crancy__item-input" type="text" name="video_id" value="{{ html_decode($module_lesson->video_id) }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Video Duration') }} ({{ __('translate.minute') }}) * </label>
                                <input class="crancy__item-input" type="number" name="video_duration" value="{{ html_decode($module_lesson->video_duration) }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Name') }} * </label>
                                <input class="crancy__item-input" type="text" name="name" value="{{ html_decode($module_lesson->name) }}">
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Serial') }} * </label>
                                <input class="crancy__item-input" type="number" name="serial" value="{{ html_decode($module_lesson->serial) }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Description') }} * </label>

                                <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description">{!! clean(html_decode($module_lesson->description)) !!}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Make it Public') }} </label>
                                <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                    <label class="crancy__item-switch">
                                    <input {{  $module_lesson->is_public_lesson == 'enable' ? 'checked' : '' }} name="is_public_lesson" type="checkbox" >
                                    <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                    <label class="crancy__item-switch">
                                    <input {{  $module_lesson->status == 'enable' ? 'checked' : '' }} name="status" type="checkbox" >
                                    <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary">{{ __('translate.Update Lesson') }}</button>
                </div>
            </form>
        </div>
    </div>
@endforeach

  <!-- New curriculum modal -->
  <div class="modal fade" id="curriculumAdd" tabindex="-1" aria-labelledby="curriculumAdd" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content delet_modal_form" method="POST" action="{{ route('admin.store-course-lesson', $course_module->id) }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="curriculumAdd">{{ __('translate.Create New Lesson') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-12">
                        <div class="crancy__item-form--group">
                            <label class="crancy__item-label">{{ __('translate.Name') }} * </label>
                            <input class="crancy__item-input" type="text" name="name" id="name" value="{{ html_decode(old('name')) }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">{{ __('translate.Video Source') }} * </label>
                            <select class="form-select crancy__item-input" name="video_source">
                                <option {{ old('video_source') == 'youtube' ? 'selected' : '' }} value="youtube">{{ __('translate.Youtube') }}</option>
                                <option {{ old('video_source') == 'vimeo' ? 'selected' : '' }} value="vimeo">{{ __('translate.Vimeo') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">{{ __('translate.Video Link') }} * </label>
                            <input class="crancy__item-input" type="text" name="video_id" value="{{ old('video_id') }}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">{{ __('translate.Video Duration') }} ({{ __('translate.minute') }}) * </label>
                            <input class="crancy__item-input" type="number" name="video_duration" value="{{ old('video_duration') }}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">{{ __('translate.Serial') }} * </label>
                            <input class="crancy__item-input" type="number" name="serial" value="{{ old('serial') }}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">{{ __('translate.Description') }} * </label>

                            <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description">{{ html_decode(old('description')) }}</textarea>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">{{ __('translate.Make it Public') }} </label>
                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                <label class="crancy__item-switch">
                                <input {{ old('is_public_lesson') ? 'checked' : '' }} name="is_public_lesson" type="checkbox" >
                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                <label class="crancy__item-switch">
                                <input {{ old('status') ? 'checked' : '' }} name="status" type="checkbox" >
                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                </label>
                            </div>
                        </div>
                    </div>



                </div>

            </div>

            <div class="modal-footer ">
                <button type="submit" class="btn btn-primary">{{ __('translate.Save Lesson') }}</button>
            </div>
        </form>
    </div>
</div>



@endsection

@push('style_section')

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
@endpush

@push('js_section')
    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script>

        (function($) {
            "use strict"
            $(document).ready(function () {
                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });
            });
        })(jQuery);

        function itemDeleteConfrimation(course_module_id, module_lesson_id){

            $("#item_delect_confirmation").attr("action",'{{ url("admin/destroy-course-lesson/") }}'+"/"+course_module_id + "/" + module_lesson_id)
        }
    </script>
@endpush



