@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Edit Course') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Edit Course') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Course') }} >> {{ __('translate.Edit Course') }}</p>
@endsection

@section('body-content')

    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row row__bscreen">
                <div class="col-12">
                    <div class="crancy-body">

                        <div class="crancy-psidebar edc-edit-course-sidebar">
                            @include('course::admin.course_sidebar')

                        </div>

                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="crancy-personals mg-top-30 ">
                                <div class="crancy-ptabs edc-edit-course-body">

                                    <form action="{{ route('admin.course-media-update', $course->id) }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="crancy-ptabs__inner">


                                            <div class="row">

                                                @if ($course->preview_video_id)
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label">{{ __('translate.Video Preview') }} </label>

                                                            @if ($course->video_source == 'youtube')
                                                                <iframe width="700" height="400"
                                                                        src="{{ html_decode($course->preview_video_id) }}">
                                                                </iframe>
                                                            @else
                                                                <iframe width="700" height="400"
                                                                        src="{{ html_decode($course->preview_video_id) }}">
                                                                </iframe>
                                                            @endif


                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-md-6 mg-top-form-20">
                                                    <div class="crancy__item-form--group w-100 h-100">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Thumbnail Image') }} </label>
                                                        <div
                                                            class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" class="btn-check" name="thumb_image"
                                                                   id="input-img1" autocomplete="off"
                                                                   onchange="previewImage(event)">
                                                            <label class="crancy-image-video-upload__label"
                                                                   for="input-img1">
                                                                @if ($course->thumb_image)
                                                                    <img id="view_img"
                                                                         src="{{ asset($course->thumb_image) }}">
                                                                @else
                                                                    <img id="view_img"
                                                                         src="{{ asset($general_setting->placeholder_image) }}">
                                                                @endif

                                                                <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }}
                                                                    <span
                                                                        class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }}
                                                                </h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Video Source') }}
                                                            * </label>
                                                        <select class="form-select crancy__item-input"
                                                                name="video_source">
                                                            <option
                                                                {{ $course->video_source == 'youtube' ? 'selected' : '' }} value="youtube">{{ __('translate.Youtube') }}</option>
                                                            <option
                                                                {{ $course->video_source == 'vimeo' ? 'selected' : '' }} value="vimeo">{{ __('translate.Vimeo') }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Video Link') }}
                                                            *</label>
                                                        <input class="crancy__item-input" type="text"
                                                               name="preview_video_id" id="preview_video_id"
                                                               value="{{ html_decode($course->preview_video_id) }}">
                                                    </div>

                                                </div>


                                            </div>


                                            <div class="d-flex justify-content-end">

                                               <div>
                                                   @if (request()->has('req_type') && request()->get('req_type') == 'from_create')
                                                       <input type="hidden" name="req_type" value="from_create">

                                                       <a class="crancy-btn next-btn mg-top-25"
                                                          href="{{ route('admin.courses.edit', ['course' => $course->id, 'lang_code' => admin_lang(), 'req_type' => 'from_create'] ) }}">
                                                           {{ __('translate.Previous') }}</a>

                                                       <button class="crancy-btn edc-crs-step-save-btn mg-top-25"
                                                               type="submit">{{ __('translate.Save & Next') }}</button>
                                                   @else

                                                       <a class="crancy-btn next-btn mg-top-25"
                                                          href="{{ route('admin.courses.edit', ['course' => $course->id, 'lang_code' => admin_lang()] ) }}">
                                                          {{ __('translate.Previous') }}</a>

                                                       <button class="crancy-btn edc-crs-step-save-btn mg-top-25"
                                                               type="submit">{{ __('translate.Update') }}</button>
                                                   @endif
                                               </div>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js_section')

    <script>
        "use strict"

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
@endpush

