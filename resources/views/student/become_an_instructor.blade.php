@extends('student.master_layout')
@section('title')
    <title>{{ __('translate.Become an Instructor') }}</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Become an Instructor') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Become an Instructor') }}</p>
@endsection
@section('body-content')


    <form action="{{ route('student.instructor-application') }}" enctype="multipart/form-data" method="POST">
    @csrf
        <!-- crancy Dashboard -->
        <section class="crancy-adashboard crancy-show">
            <div class="container container__bscreen">
                <div class="row">

                    @if ($user->instructor_joining_request == 'pending')
                    <div class="col-12  mg-top-30">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">
                                <div class="crancy-product-card">
                                <div class="alert alert-warning alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">{{ __('translate.Notice') }}</div>
                                        <p>{{ __('translate.Your instructor application under the review. please wait sometimes. you will get notify after the application approval') }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($user->instructor_joining_request == 'not_yet' || $user->instructor_joining_request == 'rejected')


                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Write Your Bio') }}</h4>

                                            <div class="row">
                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Experience') }}  * <i data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary" title="{{ __('translate.How many years of experience do you have as an instructor?') }}"></i> </label>
                                                    <input class="crancy__item-input" type="text" name="instructor_experience" value="{{ old('instructor_experience') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Designation') }} *</label>
                                                    <input class="crancy__item-input" type="text" name="designation" value="{{ old('designation') }}">
                                                </div>
                                            </div>


                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Short Bio') }} *</label>
                                                <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="about_me" id="about_me">{{ old('about_me') }}</textarea>

                                            </div>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Skills & Expertise') }}</h4>

                                                <button class="crancy-btn mg-top-25" type="button" id="add_new_skill_btn"> <i class="fas fa-plus"></i> {{ __('translate.Add Skill') }}</button>
                                            </div>

                                            <div id="dyanmic_skill_wrapper">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-25">
                                                            <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Skill') }} </label>
                                                            <input class="crancy__item-input" type="text" name="skills[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="crancy__item-form--group mg-top-25">
                                                            <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Expertise(%)') }} </label>
                                                            <input class="crancy__item-input" type="text" name="expertises[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="crancy-btn mg-top-25 remove_dynamic_area_btn" type="button"> <i class="fas fa-trash"></i>{{ __('translate.Remove') }}</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Location') }}</h4>

                                            <div class="row">
                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Country') }} *</label>
                                                    <input class="crancy__item-input" type="text" name="country" value="{{ old('country') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.State') }} *</label>
                                                    <input class="crancy__item-input" type="text" name="state" value="{{ old('state') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.City') }} *</label>
                                                    <input class="crancy__item-input" type="text" name="city" value="{{ old('city') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Address') }} *</label>
                                                    <input class="crancy__item-input" type="text" name="address" value="{{ old('address') }}">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Social Media') }}</h4>


                                            <div class="row">
                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Facebook') }}</label>
                                                    <input class="crancy__item-input" type="text" name="facebook" value="{{ old('facebook') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Linkedin') }}</label>
                                                    <input class="crancy__item-input" type="text" name="linkedin" value="{{ old('linkedin') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Twitter') }}</label>
                                                    <input class="crancy__item-input" type="text" name="twitter" value="{{ old('twitter') }}">
                                                </div>

                                                <div class="crancy__item-form--group mg-top-25 col-md-6">
                                                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Instagram') }}</label>
                                                    <input class="crancy__item-input" type="text" name="instagram" value="{{ old('instagram') }}">
                                                </div>
                                            </div>


                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Apply Now') }}</button>
                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>

                            </div>
                            <!-- End Dashboard Inner -->
                        </div>
                    </div>

                    @endif




                </div>
            </div>
        </section>
        <!-- End crancy Dashboard -->
    </form>

    <div id="new_dynamic_content" class="d-none">
        <div class="row new_dynamic_skill_body">
            <div class="col-md-6">
                <div class="crancy__item-form--group mg-top-25">
                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Skill') }} </label>
                    <input class="crancy__item-input" type="text" name="skills[]">
                </div>
            </div>
            <div class="col-md-4">
                <div class="crancy__item-form--group mg-top-25">
                    <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Expertise(%)') }} </label>
                    <input class="crancy__item-input" type="text" name="expertises[]">
                </div>
            </div>
            <div class="col-md-2">
                <button class="crancy-btn mg-top-25 remove_dynamic_area_btn" type="button"> <i class="fas fa-trash"></i>{{ __('translate.Remove') }}</button>
            </div>
        </div>

    </div>
@endsection

@push('style_section')
    <style>
        .remove_dynamic_area_btn {
            margin-top: 70px !important;
            background: #ff0808 !important;
        }
    </style>
@endpush
@push('js_section')
    <script>

        (function($) {
        "use strict";
        $(document).ready(function () {

            // start new skill
            $("#add_new_skill_btn").on("click", function(){

                let new_skill_item = $("#new_dynamic_content").html()

                $("#dyanmic_skill_wrapper").append(new_skill_item)
            });

            $(document).on('click', '.remove_dynamic_area_btn', function () {
                $(this).closest('.new_dynamic_skill_body').remove();
            });

            // end new skill

        })
    })(jQuery);

    </script>
@endpush
