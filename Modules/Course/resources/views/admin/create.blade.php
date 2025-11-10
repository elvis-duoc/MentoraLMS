@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Create Course') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create Course') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Course') }} >> {{ __('translate.Create Course') }}</p>
@endsection

@section('body-content')

    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">

                        <div class="crancy-psidebar edc-edit-course-sidebar">
                            @include('course::admin.course_create_sidebar')

                        </div>

                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Basic Information') }}</h4>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Instructor') }} * </label>
                                                    <select class="form-select crancy__item-input" name="user_id">
                                                        <option value="">{{ __('translate.Select Instructor') }}</option>
                                                        @foreach ($sellers as $seller)
                                                            <option  {{ $seller->id == old('user_id') ? 'selected' : '' }} value="{{ $seller->id }}">{{ $seller->name }} - {{ $seller->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Title') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="title" id="title" value="{{ html_decode(old('title')) }}">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Slug') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="slug" id="slug" value="{{ old('slug') }}">
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Regular Price') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="regular_price" id="regular_price" value="{{ old('regular_price') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Offer Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="offer_price" id="offer_price" value="{{ old('offer_price') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Category') }} * </label>
                                                    <select class="form-select crancy__item-input" name="category_id">
                                                        <option value="">{{ __('translate.Select Category') }}</option>
                                                        @foreach ($categories as $category)
                                                            <option  {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category?->translate?->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Course Level') }} * </label>
                                                    <select class="form-select crancy__item-input" name="course_level_id">
                                                        <option value="">{{ __('translate.Select Level') }}</option>
                                                        @foreach ($course_levels as $course_level)
                                                            <option  {{ $course_level->id == old('course_level_id') ? 'selected' : '' }} value="{{ $course_level->id }}">{{ $course_level?->translate?->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Course Language') }} * </label>
                                                    <select class="form-select crancy__item-input" name="course_language_id">
                                                        <option value="">{{ __('translate.Select Language') }}</option>
                                                        @foreach ($course_languages as $course_language)
                                                            <option  {{ $course_language->id == old('course_language_id') ? 'selected' : '' }} value="{{ $course_language->id }}">{{ $course_language?->translate?->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Total Lesson') }} * </label>
                                                    <input class="crancy__item-input" type="number" name="total_lesson" id="total_lesson" value="{{ old('total_lesson') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Total Duration') }} ({{ __('translate.hourly') }}) * </label>
                                                    <input class="crancy__item-input" type="number" name="total_duration" id="total_duration" value="{{ old('total_duration') }}">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Short Description') }} * </label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="short_description" id="short_description">{{ html_decode(old('short_description')) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} * </label>

                                                    <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description">{!! clean(html_decode(old('description'))) !!}</textarea>

                                                </div>
                                            </div>


                                        </div>

                                       <div class="d-flex justify-content-end">
                                           <button class="crancy-btn edc-crs-step-save-btn mg-top-25" type="submit">{{ __('translate.Save & Next') }}</button>
                                       </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->


    </form>



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
                $("#title").on("keyup",function(e){
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
                    $("#slug").val(slug);
                })

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

    </script>
@endpush

