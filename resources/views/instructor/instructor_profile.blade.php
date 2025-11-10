@extends('instructor.master_layout')
@section('title')
    <title>{{ __('translate.Instructor Profile') }}</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Instructor Profile') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Instructor Profile') }}</p>
@endsection
@section('body-content')

    <form action="{{ route('instructor.update-instructor-profile') }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
        <!-- crancy Dashboard -->
        <section class="crancy-adashboard crancy-show">
            <div class="container container__bscreen">
                <div class="row">

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
                                              <div class="col-md-6">
                                                  <div class="crancy__item-form--group mg-top-25">
                                                      <label class="crancy__item-label">{{ __('translate.Experience') }}  * <span data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary" title="{{ __('translate.How many years of experience do you have as an instructor?') }}"> </label>
                                                      <input class="crancy__item-input" type="text" name="instructor_experience" value="{{ html_decode($user->instructor_experience) }}">
                                                  </div>
                                              </div>

                                              <div class="col-md-6">
                                                  <div class="crancy__item-form--group mg-top-25 ">
                                                      <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Designation') }} *</label>
                                                      <input class="crancy__item-input" type="text" name="designation" value="{{ html_decode($user->designation) }}">
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="crancy__item-form--group mg-top-25 ">
                                                      <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Short Bio') }} *</label>
                                                      <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="about_me" id="about_me">{{ html_decode($user->about_me) }}</textarea>

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
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Skills & Expertise') }}</h4>

                                                <button class="crancy-btn mg-top-25" type="button" id="add_new_skill_btn"> <i class="fas fa-plus"></i> {{ __('translate.Add Skill') }}</button>
                                            </div>

                                            <div id="dyanmic_skill_wrapper">
                                                @foreach ($skills_expertises ?? [] as $index => $skills_expertise)
                                                <div class="row new_dynamic_skill_body">
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-25">
                                                            <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Skill') }} </label>
                                                            <input class="crancy__item-input" type="text" name="skills[]" value="{{ html_decode($skills_expertise->skill) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="crancy__item-form--group mg-top-25">
                                                            <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Expertise(%)') }} </label>
                                                            <input class="crancy__item-input" type="text" name="expertises[]" value="{{ html_decode($skills_expertise->expertise) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="crancy-btn delete_danger_btn remove_dynamic_area_btn"><i class="fas fa-trash"></i> </button>

                                                    </div>
                                                </div>
                                                @endforeach
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
                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-25">
                                                        <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Country') }} *</label>
                                                        <input class="crancy__item-input" type="text" name="country" value="{{ html_decode($user->country) }}">
                                                    </div>
                                                </div>
                                               <div class="col-md-6">
                                                   <div class="crancy__item-form--group mg-top-25">
                                                       <label class="crancy__item-label crancy__item-label-product">{{ __('translate.State') }} *</label>
                                                       <input class="crancy__item-input" type="text" name="state" value="{{ html_decode($user->state) }}">
                                                   </div>
                                               </div>

                                               <div class="col-md-6">
                                                   <div class="crancy__item-form--group mg-top-25">
                                                       <label class="crancy__item-label crancy__item-label-product">{{ __('translate.City') }} *</label>
                                                       <input class="crancy__item-input" type="text" name="city" value="{{ html_decode($user->city) }}">
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="crancy__item-form--group mg-top-25">
                                                       <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Address') }} *</label>
                                                       <input class="crancy__item-input" type="text" name="address" value="{{ html_decode($user->address) }}">
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
                                            <h4 class="crancy-product-card__title">{{ __('translate.Social Media') }}</h4>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-25">
                                                        <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Facebook') }}</label>
                                                        <input class="crancy__item-input" type="text" name="facebook" value="{{ html_decode($user->facebook) }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-25">
                                                        <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Linkedin') }}</label>
                                                        <input class="crancy__item-input" type="text" name="linkedin" value="{{ html_decode($user->linkedin) }}">
                                                    </div>
                                                </div>

                                               <div class="col-md-6">
                                                   <div class="crancy__item-form--group mg-top-25">
                                                       <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Twitter') }}</label>
                                                       <input class="crancy__item-input" type="text" name="twitter" value="{{ html_decode($user->twitter) }}">
                                                   </div>
                                               </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-25">
                                                        <label class="crancy__item-label crancy__item-label-product">{{ __('translate.Instagram') }}</label>
                                                        <input class="crancy__item-input" type="text" name="instagram" value="{{ html_decode($user->instagram) }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update Now') }}</button>
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
