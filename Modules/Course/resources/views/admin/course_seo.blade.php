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
                        <div class="crancy-personals mg-top-30">
                            <div class="crancy-ptabs edc-edit-course-body">

                                <form action="{{ route('admin.course-seo-update', $course->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="crancy-ptabs__inner">


                                        <div class="row">


                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group">
                                                        <label class="crancy__item-label">{{ __('translate.SEO title') }} </label>
                                                        <input class="crancy__item-input" type="text" name="seo_title" id="seo_title" value="{{ html_decode($course->seo_title) }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.SEO Description') }} </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="seo_description" id="seo_description">{{ html_decode($course->seo_description) }}</textarea>
                                                    </div>
                                                </div>

                                            </div>




                                        </div>

                                       <div class="d-flex justify-content-end">
                                         <div>
                                             @if (request()->has('req_type') && request()->get('req_type') == 'from_create')
                                                 <input type="hidden" name="req_type" value="from_create">

                                                 <a class="crancy-btn next-btn mg-top-25" href="{{ route('admin.course-curriculum', ['course_id' => $course->id, 'req_type' => 'from_create'] ) }}">  {{ __('translate.Previous') }}</a>

                                                 <button class="crancy-btn edc-crs-step-save-btn mg-top-25" type="submit">{{ __('translate.Save') }}</button>
                                             @else
                                                 <a class="crancy-btn next-btn mg-top-25" href="{{ route('admin.course-curriculum', ['course_id' => $course->id, 'req_type' => 'from_create'] ) }}">  {{ __('translate.Previous') }}</a>
                                                 <button class="crancy-btn edc-crs-step-save-btn mg-top-25" type="submit">{{ __('translate.Update') }}</button>
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
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
@endpush

